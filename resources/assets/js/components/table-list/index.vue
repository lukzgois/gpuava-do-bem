<template>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th v-for="column in columns">{{ column.placeholder }}</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="item in items">
                <td v-for="column in columns">
                    {{ item[column.name] }}
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        data() {
            return {
                items: []
            }
        },
        props: {
            columns: {
                type: Array,
                required: true
            },
            itemsUrl: {
                type: String,
                required: true
            }
        },
        ready() {
            this.$http.get(this.itemsUrl).then((response) => {
                this.items = response.data.data;
            });
        },
    }
</script>