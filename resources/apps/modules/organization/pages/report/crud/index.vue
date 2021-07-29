<template>
    <mono-page-form
        color="transparent"
        elevation="0"
    >
        <div class="d-flex flex-column width-100 px-4">
            <v-sheet
                class="mt-4 clip-corner"
                width="100%"
            >
                <v-toolbar :color="`${theme} lighten-4`" dense flat>
                    <v-toolbar-title :class="`${theme}--text`" class="overline">profile info</v-toolbar-title>
                </v-toolbar>
                
                <v-card-text>
                    <v-row no-gutters>
                        <v-col cols="12">
                            <v-text-field
                                label="Name"
                                v-model="record.name"
                            ></v-text-field>
                        </v-col>

                        <v-col cols="12">
                            <v-text-field
                                label="Email"
                                hide-details
                                v-model="record.email"
                            ></v-text-field>
                        </v-col>
                    </v-row>
                </v-card-text>

                <v-divider></v-divider>

                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn :color="theme" text @click="updateProfile">update profile</v-btn>
                </v-card-actions>
            </v-sheet>

            <v-sheet
                class="mt-4 clip-corner"
                width="100%"
            >
                <v-toolbar :color="`${theme} lighten-4`" dense flat>
                    <v-toolbar-title :class="`${theme}--text`" class="overline">profile info</v-toolbar-title>
                </v-toolbar>

                <v-card-text>
                    <v-row no-gutters>
                        <v-col cols="12">
                            <v-text-field
                                label="Sandi saat ini"
                                type="password"
                                v-model="record.current_password"
                            ></v-text-field>
                        </v-col>

                        <v-col cols="12">
                            <v-text-field
                                label="Sandi baru"
                                type="password"
                                v-model="record.password"
                            ></v-text-field>
                        </v-col>

                        <v-col cols="12">
                            <v-text-field
                                label="Konfirmasi sandi baru"
                                type="password"
                                hide-details
                                v-model="record.password_confirmation"
                            ></v-text-field>
                        </v-col>
                    </v-row>
                </v-card-text>

                <v-divider></v-divider>
                
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn :color="theme" text @click="updatePassword">update password</v-btn>
                </v-card-actions>
            </v-sheet>


            <v-sheet
                class="mt-4 clip-corner"
                width="100%"
            >
                <v-toolbar :color="`${theme} lighten-4`" dense flat>
                    <v-toolbar-title :class="`${theme}--text`" class="overline">Two Factor Authentication</v-toolbar-title>
                </v-toolbar>

                <v-card-text>
                    <template v-if="!record.two_factor_enable">
                        <p>You have not enabled two factor authentication.</p>
                        <p>When two factor authentication is enabled, you will be prompted for a secure, random token during authentication. You may retrieve this token from your phone's Google Authenticator application.</p>
                    </template>

                    <template v-else>
                        <p>Two factor authentication is now enabled. Scan the following QR code using your phone's authenticator application.</p>

                        <div class="d-block" v-html="record.two_factor_qrcode"></div>
                        
                        <p>Store these recovery codes in a secure password manager. They can be used to recover access to your account if your two factor authentication device is lost.</p>

                        <code class="d-block grey lighten-4 py-3 px-4" style="font-size: 14px;">
                            <div v-for="(code, index) in record.two_factor_recovery" 
                                :key="index"
                            >{{ code }}</div>
                        </code>
                    </template>
                </v-card-text>

                <v-divider></v-divider>

                <v-card-actions>
                    <v-spacer></v-spacer>

                    <template v-if="!record.two_factor_enable">
                        <v-btn :color="theme" text @click="enableTwoFactor">Enable Two Factor</v-btn>
                    </template>

                    <template v-else>
                        <v-btn 
                            outlined 
                            :color="theme" 
                            @click="regenerateRecoveryCode"
                        >regenerate code</v-btn>

                        <v-btn 
                            class="ml-3" 
                            depressed 
                            color="error" 
                            dark
                            @click="disableTwoFactor"
                        >disable</v-btn>
                    </template>
                </v-card-actions>
            </v-sheet>

            <!-- browser sessions -->
            <v-sheet
                class="mt-4 clip-corner"
                width="100%"
            >
                <v-toolbar :color="`${theme} lighten-4`" dense flat>
                    <v-toolbar-title :class="`${theme}--text`" class="overline">Browser Sessions</v-toolbar-title>

                    <v-spacer></v-spacer>

                    <v-btn icon @click="fetchUserSessions">
                        <v-icon>update</v-icon>
                    </v-btn>
                </v-toolbar>

                <v-card-text>
                    <template v-if="has_sessions">
                        <p>If necessary, you may logout of all of your other browser sessions across all of your devices. Some of your recent sessions are listed below; however, this list may not be exhaustive. If you feel your account has been compromised, you should also update your password.</p>

                        <div v-for="(session, index) in record.sessions" :key="index"
                            :class="{ 'mt-4': index > 0 }"
                            class="d-block"
                        >
                            <div class="d-flex">
                                <v-icon large>desktop_windows</v-icon>

                                <div class="d-block ml-2">
                                    <div class="caption">{{ session.agent.platform }} - {{ session.agent.browser }}</div>
                                    <div class="caption">
                                        {{ session.ip_address }}, 
                                        <span class="green--text" v-if="session.is_current_device">This device</span>
                                        <span v-else>Last activity: {{ session.last_active }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>

                    <template v-else>
                        <p>There is no sessions.</p>
                    </template>
                </v-card-text>

                <v-divider></v-divider>

                <v-card-actions>
                    <v-spacer></v-spacer>

                    <v-btn :color="theme" :disabled="! has_sessions" text @click="confirm_target='browser'; dialog_password = true;">logout other browser</v-btn>
                </v-card-actions>
            </v-sheet>

            <!-- device sessions -->
            <v-sheet
                class="mt-4 clip-corner"
                width="100%"
            >
                <v-toolbar :color="`${theme} lighten-4`" dense flat>
                    <v-toolbar-title :class="`${theme}--text`" class="overline">Device Tokens</v-toolbar-title>

                    <v-spacer></v-spacer>

                    <v-btn icon @click="fetchUserDevices">
                        <v-icon>update</v-icon>
                    </v-btn>
                </v-toolbar>

                <v-card-text>
                    <template v-if="has_devices">
                        <p>If necessary, you may logout of all of your other device tokens. Some of your recent tokens are listed below; however, this list may not be exhaustive. If you feel your account has been compromised, you should also update your password.</p>

                        <div v-for="(device, index) in record.devices" :key="index"
                            :class="{ 'mt-4': index > 0 }"
                            class="d-block"
                        >
                            <div class="d-flex">
                                <v-icon large>smartphone</v-icon>

                                <div class="d-block ml-2">
                                    <div class="caption">{{ device.agent.platform }} - {{ device.agent.browser }}</div>
                                    <div class="caption">
                                        {{ device.ip_address }}, 
                                        <span class="green--text" v-if="device.is_current_device">This device</span>
                                        <span v-else>Last activity: {{ device.last_active }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>

                    <template v-else>
                        <p>There is no device connected yet.</p>
                    </template>
                </v-card-text>

                <v-divider></v-divider>

                <v-card-actions>
                    <v-spacer></v-spacer>

                    <v-btn :color="theme" :disabled="! has_devices" text @click="confirm_target='device'; dialog_password = true;">logout other device</v-btn>
                </v-card-actions>
            </v-sheet>

            <v-sheet
                class="my-4 clip-corner"
                width="100%"
            >
                <v-toolbar :color="`${theme} lighten-4`" dense flat>
                    <v-toolbar-title :class="`${theme}--text`" class="overline">logout</v-toolbar-title>
                </v-toolbar>
                
                <v-card-text class="text-center">
                    <v-btn 
                        dark
                        depressed 
                        color="error" 
                        @click="dialog_logout = true"
                    >logout current device</v-btn>
                </v-card-text>
            </v-sheet>
        </div>

        <v-dialog
            v-model="dialog_password"
            max-width="344"
            persistent
        >
            <v-sheet class="clip-corner">
                <v-toolbar :color="`${theme} lighten-4`" dense flat>
                    <v-toolbar-title class="overline">password confirmation</v-toolbar-title>
                </v-toolbar>

                <v-card-text class="pt-0">
                    <v-text-field
                        class="mt-6"
                        v-model="password"
                        :type="visible ? 'text' : 'password'"
                        label="Confirm your password to continue"
                        outlined
                        hide-details
                        
                    ></v-text-field>

                    <span class="d-block caption grey--text text--darken-1 pt-1">
                        <v-checkbox 
                            class="mt-0" 
                            label="Tampilkan sandi" 
                            v-model="visible"
                            hide-details
                        ></v-checkbox>
                    </span>
                </v-card-text>

                <v-card-text class="d-flex">
                    <v-spacer></v-spacer>
                    <v-btn plain color="grey darken-4" @click="dialog_password = false">cancel</v-btn>
                    <v-btn class="ml-3" color="error" depressed dark @click="confirm_target === 'browser' ? destroyOtherBrowsers() : destroyOtherDevices()">confirm</v-btn>
                </v-card-text>
            </v-sheet>
        </v-dialog>

        <v-dialog
            v-model="dialog_logout"
            persistent
            max-width="344"
        >
            <v-sheet class="clip-corner">
                <v-card-title>Signout <span class="text-uppercase pl-2">SiMASTEN?</span></v-card-title>
                
                <v-card-text>
                    Are you sure want to logout? This will clear all your data on this device.
                </v-card-text>

                <v-card-actions>
                    <v-spacer></v-spacer>

                    <v-btn
                        :color="`${theme} lighten-2`"
                        text
                        @click="dialog_logout = false"
                    >
                        Batal
                    </v-btn>

                    <v-btn
                        dark
                        depressed 
                        color="error" 
                        @click="attemptSignout"
                    >
                        Keluar
                    </v-btn>
                </v-card-actions>
            </v-sheet>
        </v-dialog>
    </mono-page-form>
</template>

<script>
export default {
    computed: {
        has_devices: function() {
            if (this.record && ('devices' in this.record)) {
                return this.record.devices.length > 0;
            }

            return false;
        },

        has_sessions: function() {
            if (this.record && ('sessions' in this.record)) {
                return this.record.sessions.length > 0;
            }

            return false;
        },

        record: function() {
            return this.$store.state.module.record;
        },

        theme: function() {
            return this.$store.state.theme;
        }
    },

    data:() => ({
        dialog_password: false,
        dialog_logout: false,

        confirm_target: null,
        password: null,
        visible: false
    }),

    methods: {
        attemptSignout: async function() {
            this.dialogLogout = false;

            try {
                await this.$store.state.http.post('account/logout');
                
                this.$store.state.auth.clear();
                this.$router.push({ name: 'default-landing' });
            } catch (error) {
                
            }
        },

        enableTwoFactor: function() {
            this.$store.dispatch('mono_request', {
                url: 'two-factor-authentication',
                method: 'post',
                completed:() => {
                    this.fetchTwoFactorQRCode();
                }
            });
        },

        destroyOtherBrowsers: function() {
            this.$store.dispatch('mono_request', {
                url: 'destroy-other-sessions',
                method: 'delete',
                params: {
                    password: this.password
                },
                completed:() => {
                    this.dialog_password = false;
                    this.password = null;
                    this.fetchUserSessions();
                }
            });
        },

        destroyOtherDevices: function() {
            this.$store.dispatch('mono_request', {
                url: 'destroy-other-tokens',
                method: 'delete',
                params: {
                    password: this.password
                },
                completed:() => {
                    this.dialog_password = false;
                    this.password = null;
                    this.fetchUserDevices();
                }
            });  
        },

        disableTwoFactor: function() {
            this.$store.dispatch('mono_request', {
                url: 'two-factor-authentication',
                method: 'delete',
                completed:({ state }) => {
                    state.module.record.two_factor_qrcode = null;
                    state.module.record.two_factor_recovery = [];
                    state.module.record.two_factor_enable = false;
                }
            });
        },

        fetchUserSessions: function() {
            this.$store.dispatch('mono_request', {
                url: 'user-sessions',
                method: 'get',
                params: {
                    password: this.password
                },
                completed:({ state, response }) => {
                    state.module.record.sessions = response;
                }
            });
        },

        fetchUserDevices: function() {
            this.$store.dispatch('mono_request', {
                url: 'user-tokens',
                method: 'get',
                params: {
                    password: this.password
                },
                completed:({ state, response }) => {
                    state.module.record.devices = response;
                }
            });
        },

        fetchTwoFactorQRCode: function() {
            this.$store.dispatch('mono_request', {
                url: 'two-factor-qr-code',
                method: 'get',
                completed:({ state, response }) => {
                    state.module.record.two_factor_qrcode = response.svg;

                    this.fetchTwoFactorRecoveryCode();
                }
            });
        },

        fetchTwoFactorRecoveryCode: function() {
            this.$store.dispatch('mono_request', {
                url: 'two-factor-recovery-codes',
                method: 'get',
                completed:({ state, response }) => {
                    state.module.record.two_factor_recovery = response;
                    state.module.record.two_factor_enable = true;
                }
            });
        },

        regenerateRecoveryCode: function() {
            this.$store.dispatch('mono_request', {
                url: 'two-factor-recovery-codes',
                method: 'post',
                completed:() => {
                    this.fetchTwoFactorRecoveryCode();
                }
            });
        },

        updatePassword: function() {
            this.$store.dispatch('mono_request', {
                url: 'user/password',
                method: 'put',
                params:({ state }) => {
                    return { 
                        current_password: state.module.record.current_password,
                        password: state.module.record.password,
                        password_confirmation: state.module.record.password_confirmation
                    };
                },
                validation:({ state }) => {
                    if (!state.module.record.current_password || !state.module.record.password || !state.module.record.password_confirmation) {
                        return {
                            message: 'Input katasandi dan konfirmasi tidak boleh kosong.'
                        }
                    }
                }
            }).then(({ commit }) => {
                commit('APPS_SNACKBAR', {
                    color: 'success',
                    text: 'Update kata sandi Anda berhasil.',
                    state: true,
                });
            });
        },

        updateProfile: function() {
            this.$store.dispatch('mono_request', {
                url: 'user/profile-information',
                method: 'put',
                params:({ state }) => {
                    return { 
                        name: state.module.record.name,
                        email: state.module.record.email
                    };
                },
                validation:({ state }) => {
                    if (!state.module.record.name || !state.module.record.email) {
                        return {
                            message: 'Input nama dan email tidak boleh kosong.'
                        }
                    }
                }
            }).then(({ commit }) => {
                commit('APPS_SNACKBAR', {
                    color: 'success',
                    text: 'Update informasi Anda berhasil.',
                    state: true,
                });
            });
        }
    }
}
</script>