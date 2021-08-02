<template>
    <v-sheet 
        class="relative mt-4" 
        rounded="lg" 
        width="100%"
    >
        <input class="absolute width-0 height-0" type="file" :ref="uniqueId" :accept="mime" @change="onFileChange">

        <div class="d-flex py-3 px-4">
            <div class="d-flex flex-column flex-grow-1 justify-center">
                <div class="text-subtitle-1 font-weight-bold line-height-1 mt-1">{{ label }}</div>
                <small class="grey--text">{{ hint }}</small>
            </div>

            <v-btn v-if="state === 'blank'"
                :color="theme"
                elevation="0"
                dark
                fab  
                small
                @click.stop="onUploadClick"
            >
                <v-icon>file_upload</v-icon>
            </v-btn>

            <v-progress-circular v-else-if="state === 'upload'"
                :color="theme"
                :size="40"
                :width="2"
                indeterminate
            >
                <div class="caption">
                    {{ progress }}<small>%</small>
                </div>
            </v-progress-circular>

            <template v-else>
                <!-- <v-btn
                    class="mr-1"
                    color="orange"
                    elevation="0"
                    dark
                    fab  
                    small
                >
                    <v-icon>delete</v-icon>
                </v-btn> -->

                <v-btn
                    :color="theme"
                    elevation="0"
                    dark
                    fab  
                    small
                    @click.stop="onPreviewClick"
                >
                    <v-icon>source</v-icon>
                </v-btn>
            </template>
        </div>

        <v-dialog
            v-model="preview"
            fullscreen
            hide-overlay
            transition="dialog-bottom-transition"
        >
            <v-sheet color="grey lighten-3" height="100vh">
                <mono-pdf-viewer v-if="previewState"
                    :file-url="fileUrl"
                >
                    <v-btn icon @click="onPreviewClose" dark>
                        <v-icon>close</v-icon>
                    </v-btn>
                </mono-pdf-viewer>
            </v-sheet>
        </v-dialog>
    </v-sheet>
</template>

<script>
import { mapState } from 'vuex';

export default {
    props: {
        label: {
            type: String,
            default: ''
        },

        mime: {
            type: String,
            default: 'application/pdf'
        },

        extension: {
            type: String,
            default: '.pdf'
        },

        hint: {
            type: String,
            default: ''
        },

        value: {
            type: String,
            default: null
        }
    },

    computed: {
        ...mapState({
            theme: state => state.theme,
            uploader: state => state.uploader,
        })
    },

    data:() => ({
        uniqueId: Math.floor(1000 + Math.random() * 9000),
        preview: false,
        progress: 0,
        fileUrl: null,

        upload: {
            chunks: [],
            max: 1024,
            size: 524288, // 512byte * 1024
            fileSize: 0,
            loadedSize: 0,
        },

        state: 'blank',
        previewState: false
    }),

    mounted() {
        this.fileUrl = this.value;

        if (this.fileUrl) {
            this.state = 'preview';
        }
    },

    methods: {
        digest: async function(message) {
            return Array.prototype.map.call(
                new Uint8Array(
                    await crypto.subtle.digest('SHA-256', new TextEncoder().encode(message))
                ),
                (x) => ("0" + x.toString(16)).slice(-2)
            ).join("");
        },

        fileRead: function(file) {
            return new Promise((resolve, reject) => {
                try {
                    let chunks = [];
                    let chunkSize = this.upload.size;
                    let chunkTotal = Math.ceil(file.size / chunkSize);
                    
                    for (let i = 0; i < chunkTotal; i++) {
                        let chunkOffset = i * chunkSize;

                        if (chunkOffset > 0) {
                            chunkOffset = chunkOffset + 1;
                        }
                        
                        let chunkSlice = file.slice(
                            chunkOffset,
                            Math.min(i * chunkSize + chunkSize, file.size), 
                            file.type
                        );

                        chunks.push(chunkSlice);                        
                    }

                    let reader = new FileReader();
                    
                    reader.onload = (event) => {
                        this.digest(event.target.result).then((uuid) => {
                            resolve({ 
                                chunks: chunks, 
                                fileSize: file.size,
                                fileType: file.type,
                                uuid: uuid
                            });
                        });
                    };

                    reader.readAsText(chunks[0]);
                } catch (error) {
                    reject(error);
                }
            });
        },

        onFileChange: function(event) {
            this.fileRead(
                event.target.files.item(0),
            ).then(({chunks, fileSize, fileType, uuid}) => {
                this.upload.fileSize = fileSize;
                this.state = 'upload';
                
                chunks.forEach((chunk, index) => {
                    let data = new FormData;
                        data.set('file', chunk);
                        data.set('type', fileType);
                        data.set('extension', this.extension);
                        data.set('uuid', uuid);
                        data.set('part', index + 1);
                        
                    if (index + 1 >= chunks.length) {
                        data.set('last', true);
                    }

                    this.upload.chunks.push(data);
                });
            });
        },

        onPreviewClick: function() {
            if (! this.value) {
                return;
            }

            this.fileUrl = this.value;
            this.preview = true;
        },

        onPreviewClose: function() {
            this.preview = false;
            this.fileUrl = null;
        },

        onUploadClick: function() {
            this.$refs[this.uniqueId].click();
        },

        postUploadFile: async function(formData) {
            this.uploader({
                method: 'POST',
                data: formData,
                url: 'account/api/document',
                onUploadProgress: (event) => {
                    this.upload.loadedSize += parseInt(event.loaded);
                    this.progress = Math.floor((this.upload.loadedSize / this.upload.fileSize) * 100);
                }
            }).then(({ data: { url, path }}) => {
                setTimeout(() => {
                    this.upload.chunks.shift();

                    if (url) {
                        this.upload.chunks = [];
                        this.upload.loadedSize = 0;
                        this.upload.fileSize = 0;
                        this.state = 'preview';

                        if (url && url !== this.value) {
                            this.$emit('input', url);
                        }
                    }
                }, 250);
            }).catch(() => {

            });
        }
    },

    watch: {
        preview: function(state) {
            if (! state) {
                setTimeout(() => {
                    this.previewState = false;
                }, 300);

                return;
            }

            this.previewState = state;
        },

        'upload.chunks': function(chunks) {
            if (Array.isArray(chunks) && chunks.length > 0) {
                this.postUploadFile(this.upload.chunks[0]);
            }
        },

        'value': function(value) {
            this.fileUrl = value;

            if (value) {
                this.state = 'preview';
            }
        }
    }
}
</script>