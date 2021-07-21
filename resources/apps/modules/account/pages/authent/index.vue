<template>
    <v-card-text class="px-5 height-192px">
        <v-row no-gutters v-if="recoveryCode">
            <v-col cols="12">
                <v-text-field
                    label="Masukkan kode pemulihan"
                    ref="recovery_code"
                    outlined
                    hide-details
                    @keyup.enter="fetchTwoFactorChallenge"
                    v-model="recovery_code"
                ></v-text-field>
            </v-col>

            <v-col cols="12">
                <span class="d-block text-subtitle-2 font-weight-regular grey--text text--darken-1 pt-2">
                    Silahkan masukan kode pemulihan yang di berikan saat Anda mengaktifkan two-factor.
                </span>
            </v-col>
        </v-row>

        <v-row no-gutters v-else>
            <v-col cols="12">
                <v-text-field
                    label="Masukkan kode akses"
                    ref="access_code"
                    outlined
                    hide-details
                    @keyup.enter="fetchTwoFactorChallenge"
                    v-model="access_code"
                ></v-text-field>
            </v-col>

            <v-col cols="12">
                <span class="d-block text-subtitle-2 font-weight-regular grey--text text--darken-1 pt-2">
                    Silahkan masukan kode akses yang di berikan oleh Google Authenticator.
                </span>
            </v-col>
        </v-row>

        <div class="relative d-flex align-center mt-4">
            <div :class="{ 'text--disabled': disabled }"
                class="blue--text font-weight-medium" 
                @click="toggleRecoveryCode"
                style="cursor: pointer;"
            >
                Gunakan kode {{ recoveryCode ? 'pemulihan' : 'akses' }}
            </div>

            <v-spacer></v-spacer>

            <v-btn
                :disabled="disabled"
                color="light-blue"
                dark
                depressed
                @click="fetchTwoFactorChallenge"
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
        recoveryCode: false,
        access_code: null,
        recovery_code: null,
        disabled: false,
    }),

    created() {
        if (! this.email) {
            this.$router.push({ name: 'account-login' });
        }
    },

    mounted() {
        this.$refs.access_code.focus();
    },

    methods: {
        fetchTwoFactorChallenge: function() {
            this.disabled = true;
            this.$emit('updateLoading', true);

            this.$store.dispatch('mono_request', {
                url: '/two-factor-challenge',
                method: 'post',
                params:() => {
                    if (this.recoveryCode) {
                        return { recovery_code: this.recovery_code };   
                    } else {
                        return { code: this.access_code };
                    }
                },
                validation:() => {
                    if (this.recoveryCode && !this.recovery_code) {
                        this.disabled = false;
                        this.loading = false;

                        this.$refs.recovery_code.focus();

                        return {
                            message: 'Anda belum mengisi kode pemulihan pada input yang di sediakan.'
                        };
                    }

                    if (!this.recoveryCode && !this.access_code) {
                        this.disabled = false;
                        this.loading = false;

                        this.$refs.access_code.focus();

                        return {
                            message: 'Anda belum mengisi kode akses pada input yang di sediakan.'
                        };
                    }
                }
            }).then(() => {
                this.disabled = false;
                this.$emit('updateLoading', false);

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

                this.$store.state.theme = profile.theme;
                this.$router.push({ name: 'myaccount-dashboard' });
            } catch (error) {
                this.$store.state.auth.clear();
                this.$router.push({ name: 'default-landing' });
            }
        },

        toggleRecoveryCode: function() {
            this.recoveryCode = !this.recoveryCode;

            setTimeout(() => {
                if (this.recoveryCode) {
                    this.$refs.recovery_code.focus();
                } else {
                    this.$refs.access_code.focus();
                }
            }, 500);
        },
    }
}
</script>