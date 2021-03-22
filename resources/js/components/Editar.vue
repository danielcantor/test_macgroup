<template>
    <div class="container-fluid"> 
        <h3>Editar Post</h3>
        <div class="row">
            <div class="col-md-12 form-group">
                <label>Titulo</label>
                <input type="text" class="form-control" v-model="title">
            </div>
            <div class="col-md-12 form-group">
                <label >Contenido</label>
                <textarea class="form-control" rows="3" v-model="content"></textarea>
            </div>
            <div class="col-md-12">
                <button type="button" class="btn btn-primary mr-3"  v-if="mode  =='editar'" v-on:click="update">Actualizar</button> 
                <button type="button" class="btn btn-primary mr-3"  v-else-if="mode  =='crear'" v-on:click="crear">Crear</button> 
                <button type="button" class="btn" v-on:click="change">Cancelar</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['title', 'id' , 'content' , 'mode'],
        data: function () {
            return {

            }
        },
        methods: {
            update: function () {
                if (!this.title || !this.content || !this.id) {
                    return;
                }
                axios.post('/item/update',
                {
                    id : this.id,
                    title: this.title,
                    content: this.content
                })
                .then(response => {
                    this.$root.id = '';
                    this.$root.content = '';
                    this.$root.title = '';
                    this.$root.mode = 'crear'
                    this.$root.$emit('loadList');   
                })
                .catch(e => {
                    console.log(e);
                }) 
            },
            crear: function () {
                if (!this.title || !this.content ) {
                    return;
                }
                axios.post('/item/create',
                {
                    title: this.title,
                    content: this.content
                })
                .then(response => {
                    this.$root.id = '';
                    this.$root.content = '';
                    this.$root.title = '';
                    this.$root.mode = 'crear'
                    this.$root.$emit('loadList');      
                })
                .catch(e => {
                    console.log(e);
                })
            },
            change: function () {
                this.$root.id ='';
                this.$root.content = '';
                this.$root.title = '';
                this.$root.mode = 'crear'
            }
        }    
    }
</script>
