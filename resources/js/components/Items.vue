<template>
    <tr>
        <th scope="row" v-html="id"></th>
        <td v-html="title"></td>
        <td v-html="content"></td>
        <td class="btn-group inline pull-left">
            <button type="button" class="btn btn-primary mr-3" @click="GetItem(id)">Editar</button> 
            <button type="button" class="btn btn-danger" @click="DeleteItem(id)">Eliminar</button>
        </td>
    </tr>
</template>

<script>
    export default {
        props: ['title', 'id'  , 'content'],
        data: function () {
            return {
                info: []
            }
        },
        methods:{
            GetItem: function (id) {
                axios.get('/item/'+id)
                .then(response => {
                    var item = response.data.item;
                    this.$root.id = item.id;
                    this.$root.content = item.content;
                    this.$root.title = item.title;
                    this.$root.mode = 'editar'
                })
                .catch(e => {
                    console.log(e);
                })
            },
            DeleteItem: function (id) {
                axios.post('/item/delete/'+id)
                .then(response => {
                    this.$emit('Reload');   
                })
                .catch(e => {
                    console.log(e);
                })
            },
        }    
    }
</script>
