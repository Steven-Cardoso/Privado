<template>
    <ul class="list-group">
        <li class="list-group-item" v-for="(item, key) in items" :key="key">
            <div class="row">
                <div class="col-md-10 text-dark">
                    {{item.name}} <span class="float-right">{{item.price}} MZN</span>
                    <br>
                    <small>{{item.category.name}}</small>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary btn-sm" @click="handleAddButton(item)">Add</button>
                </div>
            </div>
        </li>
    </ul>
</template>
<script>
export default {
      props:['items'],
    methods: {
        handleAddButton(item) {
            window.eventBus.$emit('menuItemAdded', item);
        }
    }
}
</script>
<style>
.list-group{
    max-height: 400px;
    min-height: 400px;
    margin-bottom: 10px;
    overflow:scroll;
    -webkit-overflow-scrolling: touch;
}
</style>