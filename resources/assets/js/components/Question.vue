<template>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">
                {{ title }}
            </h3>
        </div>
        <div class="list-group">
            <button type="button"
                    class="list-group-item"
                    v-on:click="select(item)"
                    v-for="item in items">
                {{ item.name }}
            </button>
        </div>
    </div>
</template>

<script>
export default {
    props: [
        'value',
        'items',
        'title'
    ],
    methods: {
        select(item) {
            this.$emit('input', item);
        }
    }
}
</script>