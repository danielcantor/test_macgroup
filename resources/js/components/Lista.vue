<template>
<div class="container-fluid">
    <h3>Listado de Posts</h3>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Titulo</th>
      <th scope="col">Contenido</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <Item  v-for="item in array" 
            v-bind:key="item.id"
            v-bind:id="item.id"
            v-bind:content="item.content"
            v-bind:title="item.title"
            @Reload="getList">
    
    </Item>
  </tbody>
</table>
<nav aria-label="Navigation">
  <ul class="pagination">
    <Paginacion  v-for="page in pagination" 
            v-bind:key="page.label"
            v-bind:label="page.label"
            v-bind:active="page.active"
            v-bind:url="page.url"
            @Paginate="goTo">
    </Paginacion>
  </ul>
</nav>
</div>
    
</template>

<script>
import Item from './Items.vue';
import Paginacion from './paginacion.vue';
    export default {
        name: 'Lista',
        data: function () {
            return {
                array: [],
                pagination : []
            }
        },        
        components: {
            Item,
            Paginacion
        },
        methods:{
            getList: function () {
              axios.get('/list')
              .then(response => {
                  this.array = response.data.data;
                  this.pagination = response.data.links;
              })
              .catch(e => {
                  console.log(e);
              })
            },
            goTo: function(event){
              axios.get(event)
              .then(response => {
                  this.array = response.data.data;
                  this.pagination = response.data.links;
              })
              .catch(e => {
                  console.log(e);
              })
            }
        },
        mounted() {
          this.$root.$on('loadList', this.getList);
          this.getList();
        }
    }
</script>
