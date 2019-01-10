<template>
    <div>
        <img :src="croppedImage" alt="">
        <div v-if="cropped">
            <vue-avatar
                    :width=400
                    :height=400
                    ref="vueavatar"
                    @vue-avatar-editor:image-ready="onImageReady"
                    image="https://vuejs.org/images/logo.png"
            >
            </vue-avatar>
            <br>
            <vue-avatar-scale
                    ref="vueavatarscale"
                    @vue-avatar-editor-scale:change-scale="onChangeScale"
                    :width=250
                    :min=1
                    :max=3
                    :step=0.02
            >
            </vue-avatar-scale>
            <button class="btn btn-primary" v-on:click="saveClicked">Click</button>
        </div>
        <div v-else>
            <button class="btn btn-primary" @click="startCropping">Back</button>
        </div>
    </div>
</template>

<script>
    import Vue from 'vue'
    import VueAvatar from '../vue-avatar-editor/src/components/VueAvatar'
    import VueAvatarScale from '../vue-avatar-editor/src/components/VueAvatarScale'
    export default {
        components: {
            VueAvatar,
            VueAvatarScale
        },
        data(){
            return {
                croppedImage: null,
                cropped: true,
            }
        },
        methods:{
            onChangeScale (scale) {
                this.$refs.vueavatar.changeScale(scale)
            },
            saveClicked(){
                var img = this.$refs.vueavatar.getImageScaled()
                this.croppedImage = img.toDataURL()
                this.cropped = false
            },
            onImageReady(scale){
                this.$refs.vueavatarscale.setScale(scale)
            },
            startCropping(){
                this.croppedImage = false
                this.cropped = true
            }
        }
    }
</script>