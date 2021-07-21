<template>
    <v-card-text class="px-5 height-192px">
        <v-row no-gutters>
            <v-col cols="12">
                <v-text-field
                    v-model="email"
                    :disabled="disabled"
                    autocomplete="off"
                    label="NIP atau Email"
                    placeholder="monoland@dev"
                    ref="email"
                    hide-details
                    outlined
                    @keyup.enter="verifyEmailAddress"
                ></v-text-field>
            </v-col>

            <v-col cols="12">
                <span class="d-block text-subtitle-2 font-weight-regular grey--text text--darken-1 pt-2">
                    Masukan NIP atau Email yang telah terdaftar pada aplikasi.
                </span>
            </v-col>
        </v-row>

        <div class="relative d-flex align-center mt-4">
            <v-spacer></v-spacer>

            <v-btn
                :disabled="disabled"
                color="light-blue"
                dark
                depressed
                @click="verifyEmailAddress"
            >berikutnya</v-btn>
        </div>
    </v-card-text>
</template>

<script>
export default {
    data:() => ({
        email: null,
        disabled: false,
    }),

    mounted() {
        this.$refs.email.focus();
    },

    methods: {
        verifyEmailAddress: function() 
        {
            this.disabled = true;
            this.$emit('updateLoading', true);
            
            this.$store.dispatch('mono_request', {
                url: '/email-check',
                method: 'post',
                params: {
                    email: this.email
                },
                validation:() => {
                    if (! this.email) {
                        this.disabled = false;
                        this.$emit('updateLoading', false);
                        this.$refs.email.focus();

                        return {
                            message: 'Anda belum mengisi NIP atau email pada input yang di sediakan.'
                        };
                    }
                }
            }).then(() => {
                this.disabled = false;
                this.$emit('updateLoading', false);
                this.$emit('emailValidated', this.email);
                
                this.$router.push({ name: 'account-password' });
            }).catch(() => {
                this.disabled = false;
                this.$emit('updateLoading', false);
                this.$refs.email.focus();
            });
        },
    }
};
</script>