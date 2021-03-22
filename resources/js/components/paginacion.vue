<template>
    <li class="page-item" :class="{
      'active': active,
      'disabled' : !url
    }" @click="Paginate(url)">
        <a class="page-link"   href="#" v-html="label"></a>
    </li>
</template>

<script>

    export default {
        props:['label','active', 'url'],
        data: function () {
            return {
            }
        },
        methods: {
            Paginate(url) {
                this.$emit('Paginate', url);
            }
        }   
    }
</script>
