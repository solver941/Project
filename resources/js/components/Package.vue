<template>
    <div>
        <div v-if="state == 'success'" class="alert alert-success">
            {{ message }}
        </div>
        <div v-else-if="state == 'error'" class="alert alert-danger alert-block">
            {{ message }}
        </div>
        <form @submit.prevent="store()">

            <div class="form-group">
                <label for="exampleFormControlInput1">Jméno balíčku</label>
                <input v-model="name" name="name" type="text" class="form-control" placeholder="" required>
            </div>

            <br>
            <div class="form-group">
                <label for="exampleFormControlInput1">Které zboží</label>
                <div class="custom-select" style="width:200px;">
                    <select name="product_type" v-model="selected_product">
                        <option value="0">Vyber zboží:</option>
                        <template v-for="product in products">
                            <option :value="product">{{ product.description }}</option>
                        </template>
                    </select>
                </div>
            </div>


            <br>
            <div class="form-group">
                <label for="exampleFormControlInput1">Kolikrát</label>

                <!--        Count by měl  reprezentovat číslo kolik je daného produktu uloženo, aby se do balíčku nepřidalo víc než toho produktu je.
                        Bohužel se mi, ale nepovedlo přímo ve view získat vybranou možnost a podle čehož by jsem následně definoval počet pro danej produkt.-->

                <input v-model="count" :disabled="selected_product == '0'" name="count" type="number"
                       class="form-control-file" placeholder="" :max="selected_product.count" required>
            </div>

            <br>


            <div class="form-group">
                <label for="exampleFormControlInput1">Cena</label>
                <input v-model="price" name="price" type="number" class="form-control-file" placeholder="" required>
            </div>

            <br><br>

            <div class="text-lg-right">
                <button type="submit" class="btn btn-primary">Vytvořit</button>
            </div>

        </form>
    </div>
</template>

<script>
export default {
    name: "Package",
    props: ['products'],
    data() {
        return {
            selected_product: "0",
            name: "",
            product_type: "",
            count: "",
            price: "",
            state: '',
            message:"",
        }
    },
    mounted() {
    },
    methods: {
        store() {
            axios.post('/package', {
                name: this.name,
                product_type: this.selected_product.id,
                count: this.count,
                price: this.price,
            }).then((response) => {
                this.state = response.data.state;
                this.message = response.data.message;
                console.log(response.data)

            })
        }
    }
}
</script>

<style scoped>

</style>
