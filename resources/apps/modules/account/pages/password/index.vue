<template>
    <v-card-text class="px-5 height-192px">
        <v-row no-gutters>
            <v-col cols="12">
                <v-text-field
                    v-model="password"
                    :disabled="disabled"
                    :type="visible ? 'text' : 'password'"
                    autocomplete="off"
                    label="Masukkan sandi Anda"
                    ref="password"
                    outlined
                    hide-details
                    @keyup.enter="attemptLogin"
                ></v-text-field>
            </v-col>

            <v-col cols="12">
                <v-checkbox 
                    :disabled="disabled"
                    class="mt-2" 
                    label="Tampilkan sandi" 
                    v-model="visible"
                ></v-checkbox>
            </v-col>
        </v-row>

        <div class="relative d-flex align-center mt-4">
            <v-spacer></v-spacer>

            <v-btn
                :disabled="disabled"
                color="light-blue"
                dark
                depressed
                @click="attemptLogin"
            >berikutnya</v-btn>
        </div>
    </v-card-text>
</template>

<script>
export default {
    props: {
        deviceName: {
            type: String,
            default: null
        },

        email: {
            type: String,
            default: null
        }
    },

    data:() => ({
        password: null,
        disabled: false,
        visible: false,
    }),

    created() {
        if (! this.email) {
            this.$router.push({ name: 'account-login' });
        }
    },

    mounted() {
        this.$refs.password.focus();
    },

    methods: {
        attemptLogin: async function() 
        {
            this.disabled = true;
            this.$emit('updateLoading', true);

            this.$store.dispatch('mono_request', {
                method: 'post',
                url: '/login',
                
                params: {
                    email: this.email,
                    password: this.password
                },

                validation:() => {
                    if (!this.password) {
                        this.disabled = false;
                        this.$emit('updateLoading', false);

                        this.$refs.password.focus();

                        return {
                            message: 'Anda belum mengisi Sandi pada input yang di sediakan.'
                        };
                    }
                }
            }).then(({ response }) => {
                this.disabled = false;
                this.$emit('updateLoading', false);
                
                if (response && response.two_factor) {
                    this.$emit('emailValidated', this.email);

                    this.$router.push({ name: 'account-authent' });
                    return;
                }

                this.$store.state.auth.setItem('authorized', true);

                this.fetchUserData();
            }).catch(() => {
                this.disabled = false;
                this.$emit('updateLoading', false);
            });
        },

        fetchUserData: async function()
        {
            try {
                let { data: { token, modules, profile } } = await this.$store.state.http.post('/api/user-data', {
                    breakpoint: window.breakpoint,
                    device: this.deviceName
                });

                this.$store.commit('AUTH_INITIALIZE', { token, modules, profile });

                if (this.$store.state.auth.hasKey('token')) {
                    this.$store.state.auth.removeItem('token');
                }
                
                if (token) {
                    this.$store.state.auth.setItem('token', token);
                }

                this.$store.state.auth.setItem('identifier', profile.identifier);

                this.$store.state.theme = profile.theme;
                this.$router.push({ name: 'myaccount-dashboard' });
            } catch (error) {
                this.$store.state.auth.clear();
                this.$router.push({ name: 'default-landing' });
            }
        }
    }
}
</script>