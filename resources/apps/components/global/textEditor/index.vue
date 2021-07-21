<template>
    <div class="text-editor">
        <label style="color: rgba(0,0,0,.6); font-size: 13px;">{{ label }}</label>

        <v-row no-gutters v-if="editor">
            <v-col :cols="mobileBreakpoint ? 2: 1">
                <v-btn elevation="0" tile @click="editor.chain().focus().toggleHeading({ level: 2 }).run()" :dark="editor.isActive('heading', { level: 2 })" :style="mobileBreakpoint ? 'padding: 0; min-width: 62px;' : 'padding: 0; min-width: 42px;'">
                    <v-icon small>format_size</v-icon>
                </v-btn>
            </v-col>

            <v-col :cols="mobileBreakpoint ? 2: 1">
                <v-btn elevation="0" tile @click="editor.chain().focus().setParagraph().run()" :dark="editor.isActive('paragraph')" :style="mobileBreakpoint ? 'padding: 0; min-width: 62px;' : 'padding: 0; min-width: 42px;'">
                    <v-icon small>format_textdirection_l_to_r</v-icon>
                </v-btn>
            </v-col>

            <v-col :cols="mobileBreakpoint ? 2: 1">
                <v-btn elevation="0" tile @click="editor.chain().focus().toggleBold().run()" :dark="editor.isActive('bold')" :style="mobileBreakpoint ? 'padding: 0; min-width: 62px;' : 'padding: 0; min-width: 42px;'">
                    <v-icon small>format_bold</v-icon>
                </v-btn>
            </v-col>

            <v-col :cols="mobileBreakpoint ? 2: 1">
                <v-btn elevation="0" tile @click="editor.chain().focus().toggleItalic().run()" :dark="editor.isActive('italic')" :style="mobileBreakpoint ? 'padding: 0; min-width: 62px;' : 'padding: 0; min-width: 42px;'">
                    <v-icon small>format_italic</v-icon>
                </v-btn>
            </v-col>

            <v-col :cols="mobileBreakpoint ? 2: 1">
                <v-btn elevation="0" tile @click="editor.chain().focus().toggleStrike().run()" :dark="editor.isActive('strike')" :style="mobileBreakpoint ? 'padding: 0; min-width: 62px;' : 'padding: 0; min-width: 42px;'">
                    <v-icon small>format_strikethrough</v-icon>
                </v-btn>
            </v-col>

            <v-col :cols="mobileBreakpoint ? 2: 1">
                <v-btn elevation="0" tile @click="editor.chain().focus().unsetAllMarks().run()" :style="mobileBreakpoint ? 'padding: 0; min-width: 62px;' : 'padding: 0; min-width: 42px;'">
                    <v-icon small>format_clear</v-icon>
                </v-btn>
            </v-col>

            <v-col :cols="mobileBreakpoint ? 2: 1" :style="mobileBreakpoint ? 'margin-top: 1px;' : ''">
                <v-btn elevation="0" tile @click="editor.chain().focus().setHardBreak().run()" :style="mobileBreakpoint ? 'padding: 0; min-width: 62px;' : 'padding: 0; min-width: 42px;'">
                    <v-icon small>vertical_align_bottom</v-icon>
                </v-btn>
            </v-col>

            <v-col :cols="mobileBreakpoint ? 2: 1" :style="mobileBreakpoint ? 'margin-top: 1px;' : ''">
                <v-btn elevation="0" tile @click="editor.chain().focus().toggleBulletList().run()" :dark="editor.isActive('bulletList')" :style="mobileBreakpoint ? 'padding: 0; min-width: 62px;' : 'padding: 0; min-width: 42px;'">
                    <v-icon small>format_list_bulleted</v-icon>
                </v-btn>
            </v-col>

            <v-col :cols="mobileBreakpoint ? 2: 1" :style="mobileBreakpoint ? 'margin-top: 1px;' : ''">
                <v-btn elevation="0" tile @click="editor.chain().focus().toggleOrderedList().run()" :dark="editor.isActive('orderedList')" :style="mobileBreakpoint ? 'padding: 0; min-width: 62px;' : 'padding: 0; min-width: 42px;'">
                    <v-icon small>format_list_numbered</v-icon>
                </v-btn>
            </v-col>

            <v-col :cols="mobileBreakpoint ? 2: 1" :style="mobileBreakpoint ? 'margin-top: 1px;' : ''">
                <v-btn elevation="0" tile @click="editor.chain().focus().toggleCodeBlock().run()" :dark="editor.isActive('codeBlock')" :style="mobileBreakpoint ? 'padding: 0; min-width: 62px;' : 'padding: 0; min-width: 42px;'">
                    <v-icon small>subtitles</v-icon>
                </v-btn>
            </v-col>

            <v-col :cols="mobileBreakpoint ? 2: 1" :style="mobileBreakpoint ? 'margin-top: 1px;' : ''">
                <v-btn elevation="0" tile @click="editor.chain().focus().toggleBlockquote().run()" :dark="editor.isActive('blockquote')" :style="mobileBreakpoint ? 'padding: 0; min-width: 62px;' : 'padding: 0; min-width: 42px;'">
                    <v-icon small>format_quote</v-icon>
                </v-btn>
            </v-col>
        </v-row>
        
        <v-divider></v-divider>

        <editor-content class="content pt-4" :editor="editor" />
    </div>
</template>

<script>
import { debounce } from 'debounce';
import { Editor, EditorContent } from '@tiptap/vue-2'
import StarterKit from '@tiptap/starter-kit'

export default {
    name: 'v-text-editor',

    components: {
        EditorContent,
    },

    props: {
        label: {
            type: String,
            default: null
        },

        value: {
            type: String,
            default: '',
        },
    },

    data:() =>  ({
        editor: null,
        mobileBreakpoint: window.breakpoint === 'mobile'
    }),

    mounted() {
        this.editor = new Editor({
            content: this.value,
            extensions: [
                StarterKit,
            ],
        });

        this.editor.on("update", ({ editor }) => {
            this.updatedContent(editor.getHTML());
        });
    },

    methods: {
        updatedContent: debounce(function (value) {
            this.$emit('input', value);
        }, 1000),
    },

    beforeDestroy() {
        this.editor.destroy()
    },

    watch: {
        value: {
            handler: function(value) {
                if (this.editor.getHTML() === value) {
                    return;
                }

                this.editor.commands.setContent(this.value, false);
            },

            deep: true
        }
    }
}
</script>