<template>
    <v-card
        class="mx-auto overflow-hidden"
        height="1000"
    >
        <Header/>
        <BreadcrumbTrail/>
        <v-container>
            <slot/>
        </v-container>
        <Footer/>
    </v-card>
</template>

<script>
import Header from "../organisms/common/Header"
import BreadcrumbTrail from "../organisms/common/BreadcrumbTrail"
import Footer from "../organisms/common/Footer"
export default {
    components: {
        Header,
        BreadcrumbTrail,
        Footer,
    },
    methods: {
        postLogout: function(){
            axios.post('/api/logout')
            .then(
                res => {
                    this.token = res.data.token
                    localStorage.removeItem("auth")
                    location.href="/"
                }
            )
            .catch(function (error) {
                alert(error)
            }
            )
        }
    }
}
</script>
