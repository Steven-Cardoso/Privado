<template>
     <tbody>
                    <tr v-for="order in orders" :key="order.id">
                        <td>{{order.id}}</td>
                        <td>{{order.amount}} Mzn</td>
                        <td>{{(order.isComplete) ? 'Completo' : 'Incompleto'}}</td>
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
                                {{(order.isPaid) ? 'Sim' : 'Nao'}}
                            </td>
                            <td>
                                <button class="btn btn-sm btn-success" @click="clickComplete(order)">Completo</button> 
                                <br>
                                <br>
                                <button class="btn btn-sm btn-warning" @click="clickDelete(order)">Delete</button> 
                                <br>
                                <br>
                                <button class="btn btn-sm btn-warning" @click="clickPaid(order)">Pago</button> 
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
        },
        clickPaid(order) {
            this.$emit("onPaid", order);
        }
    },
    /*Funciona
    computed: {
        name2: function () {
            return this.orders.filter(i => i.order_details.customer_name === 'Russel Kreiger')
        }
    }*/
}
</script>