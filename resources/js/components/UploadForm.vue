<template>
    <div>
        <input type="file" name="image" @change="GetImage" accept="image/*">
        <img :src="avatar" alt="image">
        <a href="#" v-if="loaded" class="btn btn-outline-success" @click.prevet="upload">Upload</a>
        <a href="#" v-if="loaded" class="btn btn-outline-danger" @click.prevet="cancel">Cancel</a>
    </div>
</template>

<script>
    export default {
        props:['user'],

        data(){
            return{
                avatar: this.user.avatar,
                loaded: false,
            }
        },

        methods:{
            GetImage(e){
                let image = e.target.files[0];
                this.read(image);
            },

            upload(){
                axios.post('/upload', {'image':this.avatar})
                    .then(res => this.$toasted.show('Imagem enviada com sucesso!', {
                        type: 'success',
                        })
                    );
            },

            read(image){
                let reader = new FileReader();
                reader.readAsDataURL(image);
                reader.onload = e => {
                    this.avatar = e.target.result;
                }
                this.loaded = true;
            },

            cancel(){
                this.avatar = this.user.avatar;
                this.loaded = false;
            }
        }
    }
</script>