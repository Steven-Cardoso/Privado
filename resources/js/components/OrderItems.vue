<template>
     <tbody>
                    <tr v-for="order in orders" :key="order.id">
                        <td>{{order.id}}</td>
                        <td>{{order.amount}} Mzn</td>
                        <td>{{(order.isComplete) ? 'Completed' : 'Incompleted'}}</td>
                        <td>
                                Nome: {{order.order_details.customer_name}}
                                <br>
                                Telefone: {{order.order_details.customer_phone}}
                                <br>
                                Email: {{order.order_details.customer_address}}
                            </td>
                            <td>
                               {{order.pratos}}
                            </td>
                            <td>
                               {{order.name}}
                            </td>
                            <td>
                                <button class="btn btn-sm btn-success" @click="clickComplete(order)">Completo</button> 
                                <br>
                                <br>
                                <button class="btn btn-sm btn-warning" @click="clickDelete(order)">Delete</button> 
                            </td>
                    </tr>
                </tbody>
</template>
<script>
export default {
    props: ['orders'],
    methods: {
        clickComplete(order) {
            this.$emit("onComplete", order);
        },
        clickDelete(order) {
            this.$emit("onDelete", order);
        }
    }
}
</script>