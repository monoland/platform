<template>
    <div class="d-block">
        <v-toolbar :color="theme" flat>
            <v-toolbar-title class="subtitle-2">
                <span class="font-weight-regular white--text">PDF File</span>
            </v-toolbar-title>

            <v-spacer></v-spacer>
                <span class="white--text" v-if="pdfjs.pageNumber > 0">{{ pdfjs.pageNumber }} / {{ pdfjs.pageTotal }}</span>
            <v-spacer></v-spacer>

            <v-btn icon dark @click="zoom_in">
                <v-icon>zoom_in</v-icon>
            </v-btn>

            <v-btn icon dark @click="zoom_out">
                <v-icon>zoom_out</v-icon>
            </v-btn>

            <v-btn icon dark @click="rotate_left">
                <v-icon>rotate_left</v-icon>
            </v-btn>

            <v-btn icon dark @click="rotate_right">
                <v-icon>rotate_right</v-icon>
            </v-btn>
            
            <v-btn icon dark @click="download_file">
                <v-icon>get_app</v-icon>
            </v-btn>

            <v-btn icon dark @click="perform_print">
                <v-icon>print</v-icon>
            </v-btn>

            <v-progress-linear
                :active="pdfjs.progress > 0"
                :indeterminate="true"
                absolute
                bottom
                color="deep-purple accent-4"
            ></v-progress-linear>

            <slot></slot>
        </v-toolbar>

        <v-responsive 
            id="pageContainer"
            class="absolute overflow-y-auto grey darken-3 width-100"
            :height="`calc(100vh - 64px)`"
        ></v-responsive>

        <v-overlay absolute :value="pdfjs.performState">
            <v-progress-circular
                :size="100"
                :width="15"
                :value="pdfjs.performValue"
            >
                {{ pdfjs.performValue }}
            </v-progress-circular>
        </v-overlay>

        <div id="printContainer" class="d-block" :v-show="false"></div>
    </div>
</template>

<script>
import { mapState } from 'vuex';
import * as pdfjsLib from "pdfjs-dist/build/pdf.min";
import { EventBus, PDFLinkService, PDFViewer } from "pdfjs-dist/web/pdf_viewer.js";

pdfjsLib.GlobalWorkerOptions.workerSrc = "/pdfjs/pdf.worker.min.js";

export default {
    props: {
        fileUrl: {
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

    beforeDestroy() {
        this.pdfjs_destroy();
    },

    data:() => ({
        pdfjs: {
            DEFAULT_SCALE_DELTA: 1.1,
            MIN_SCALE: 0.25,
            MAX_SCALE: 10.0,
            CSS_UNITS: 96.0 / 72.0,
            PRINT_UNITS: 150 / 72.0,

            eventBus: null,
            linkService: null,
            pdfViewer: null,
            loadTasks: null,
            document: null,
            pagesOverview: [],
            pageNumber: 0,
            scratchCanvas: null,
            printContainer: null,
            print: null,
            currentPage: -1,
            pageTotal: 0,
            performState: false,
            performValue: 0,

            loaded: false,
            progress: -1
        },
    }),

    mounted() {
        window.print = () => {
            this.render_pages()
                .then(() => {
                    this.print_page();
                });
        };

        this.pdfjs.scratchCanvas = document.createElement('canvas');
        this.pdfjs.printContainer = document.getElementById("printContainer");
        this.pdfjs.print = window.print;

        if (! this.fileUrl) {
            return;
        }

        this.pdfjs_init(this.fileUrl);
    },

    methods: {
        download_file: function() {
            this.uploader({
                url: this.fileUrl,
                method: 'GET',
                responseType: 'blob'
            }).then((response) => {
                let fileURL = window.URL.createObjectURL(new Blob([response.data]));
                let fileLink = document.createElement('a');

                let fileName = this.fileUrl.split('/');
                    fileName = fileName[fileName.length - 1];
            
                fileLink.href = fileURL;
                fileLink.setAttribute('download', fileName);
                document.body.appendChild(fileLink);
            
                fileLink.click();
            });
        },

        on_page_changing: function(event) {
            if ('pageNumber' in event) {
                this.pdfjs.pageNumber = event.pageNumber;
            }
        },

        on_pages_loaded: function() {
            if (! this.pdfjs.pdfViewer) {
                return;
            }
            this.pdfjs.progress = -1;
            this.pdfjs.pagesOverview = this.pdfjs.pdfViewer.getPagesOverview();
            this.pdfjs.pageTotal = this.pdfjs.pdfViewer.pagesCount;
            this.pdfjs.pageNumber = 1;
        },

        rotate_right: function() {
            this.pdfjs.pdfViewer.pagesRotation = parseInt(this.pdfjs.pdfViewer.pagesRotation) + 90;
        },

        rotate_left: function() {
            this.pdfjs.pdfViewer.pagesRotation = parseInt(this.pdfjs.pdfViewer.pagesRotation) - 90;
        },

        pdfjs_destroy: function() {
            this.pdfjs.eventBus.off('pagechanging', this.on_page_changing);
            this.pdfjs.eventBus.off('pagesloaded', this.on_pages_loaded);
            
            this.pdfjs = {
                DEFAULT_SCALE_DELTA: 1.1,
                MIN_SCALE: 0.25,
                MAX_SCALE: 10.0,
                CSS_UNITS: 96.0 / 72.0,
                PRINT_UNITS: 150 / 72.0,

                eventBus: null,
                linkService: null,
                pdfViewer: null,
                loadTasks: null,
                document: null,
                pagesOverview: [],
                pageNumber: 0,
                scratchCanvas: null,
                printContainer: null,
                print: null,
                currentPage: -1,
                pageTotal: 0,
                performState: false,
                performValue: 0,

                loaded: false,
                progress: -1
            };
        },

        pdfjs_init: function(fileUrl) {
            this.pdfjs.eventBus = new EventBus();
            this.pdfjs.eventBus.on('pagechanging', this.on_page_changing);
            this.pdfjs.eventBus.on('pagesloaded', this.on_pages_loaded);

            this.pdfjs.linkService = new PDFLinkService({
                eventBus: this.pdfjs.eventBus,
            });

            this.pdfjs.pdfViewer = new PDFViewer({
                container: document.getElementById('pageContainer'),
                enableWebGL: true,
                eventBus: this.pdfjs.eventBus,
                linkService: this.pdfjs.linkService,
                textLayerMode: 0
            });

            this.pdfjs.loadTasks = pdfjsLib.getDocument({
                url: fileUrl,
                withCredentials: true,
                verbosity: 0
            });

            // bind onProgress
            this.pdfjs.loadTasks.onProgress = (progressData) => {
                this.pdfjs.progress = Math.round(progressData.loaded / progressData.total);
            };
            
            this.pdfjs.loadTasks.promise.then(document => {
                this.pdfjs.document = document;
                this.pdfjs.pdfViewer.setDocument(document);
                this.pdfjs.linkService.setDocument(document);
            });
        },

        render_page: function(pageNumber, size) {
            const scratchCanvas = this.pdfjs.scratchCanvas;

            scratchCanvas.width = Math.floor(size.width * this.pdfjs.PRINT_UNITS);
            scratchCanvas.height = Math.floor(size.height * this.pdfjs.PRINT_UNITS);

            const width = Math.floor(size.width * this.pdfjs.CSS_UNITS) + "px";
            const height = Math.floor(size.height * this.pdfjs.CSS_UNITS) + "px";

            const ctx = scratchCanvas.getContext("2d");    
            
            ctx.save();
            ctx.fillStyle = "rgb(255, 255, 255)";
            ctx.fillRect(0, 0, scratchCanvas.width, scratchCanvas.height);
            ctx.restore();

            return this.pdfjs.document.getPage(pageNumber).then(pdfPage => {
                return pdfPage.render({
                    canvasContext: ctx,
                    transform: [this.pdfjs.PRINT_UNITS, 0, 0, this.pdfjs.PRINT_UNITS, 0, 0],
                    viewport: pdfPage.getViewport({ scale: 1, rotation: size.rotation }),
                    intent: 'print',
                    annotationStorage: this.pdfjs.document.annotationStorage,
                }).promise;  
            }).then(() => {
                return {
                    width,
                    height,
                };
            });
        },

        render_pages: function() {
            const pageCount = this.pdfjs.pagesOverview.length;
            
            const renderNextPage = (resolve, reject) => {
                if (++this.pdfjs.currentPage >= pageCount) {
                    this.pdfjs.performState = false;
                    this.pdfjs.performValue = 0;
                    resolve();
                    return;
                }
                
                let index = this.pdfjs.currentPage;

                this.pdfjs.performState = true;
                this.pdfjs.performValue = Math.floor(((index + 1) / pageCount) * 100);

                this.render_page(index + 1, this.pdfjs.pagesOverview[index])
                    .then(this.use_rendered_page.bind(this))
                    .then(() => {
                        renderNextPage(resolve, reject);
                    }, reject);
            }

            return new Promise(renderNextPage);
        },

        use_rendered_page: function(printItem) {
            const img = document.createElement("img");
            
            img.style.width = printItem.width;
            img.style.height = printItem.height;

            const scratchCanvas = this.pdfjs.scratchCanvas;

            if ('toBlob' in scratchCanvas) {
                scratchCanvas.toBlob((blob) => {
                    img.src = URL.createObjectURL(blob);
                });
            } else {
                img.src = scratchCanvas.toDataURL();
            }

            const wrapper = document.createElement("div");
            
            wrapper.appendChild(img);
            this.pdfjs.printContainer.appendChild(wrapper);

            return new Promise(function (resolve, reject) {
                img.onload = resolve;
                img.onerror = reject;
            });
        },

        perform_print: function () {
            return new Promise(resolve => {
                setTimeout(() => {
                    this.pdfjs.print.call(window);

                    setTimeout(resolve, 20);
                }, 0);
            })
        },

        print_page: function() {
            let printer = window.open('', '', 'height=600,width=800');
            let styles = printer.document.createElement('style');
            styles.innerHTML = `
                body {
                    margin: 0;
                    width: 100vw;
                }

                body > div {
                    width: 100%;   
                }

                body > div > img {
                    width: 100%;
                }
            `;
            printer.document.head.appendChild(styles);
            printer.document.write(this.pdfjs.printContainer.innerHTML);
            printer.document.close();
            printer.focus();
            printer.print();
            printer.close();
        },

        zoom_in: function() {
            let newScale = this.pdfjs.pdfViewer.currentScale;

            newScale = (newScale * this.pdfjs.DEFAULT_SCALE_DELTA).toFixed(2);
            newScale = Math.ceil(newScale * 10) / 10;
            newScale = Math.min(this.pdfjs.MAX_SCALE, newScale);

            if (newScale < this.pdfjs.MAX_SCALE) {
                this.pdfjs.pdfViewer.currentScaleValue = newScale;
            }
        },

        zoom_out: function() {
            let newScale = this.pdfjs.pdfViewer.currentScale;

            newScale = (newScale / this.pdfjs.DEFAULT_SCALE_DELTA).toFixed(2);
            newScale = Math.floor(newScale * 10) / 10;
            newScale = Math.max(this.pdfjs.MIN_SCALE, newScale);

            if (newScale > this.pdfjs.MIN_SCALE) {
                this.pdfjs.pdfViewer.currentScaleValue = newScale;
            }
        },
        
    },

    watch: {
        fileUrl: function(url) {
            if (! url) {
                return;
            }

            this.pdfjs_init(url);
        },
    }
}
</script>