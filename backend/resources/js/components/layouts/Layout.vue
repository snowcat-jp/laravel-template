<template>
    <v-card
        class="mx-auto overflow-hidden"
        height="1000"
    >
        <Header/>
        <BreadcrumbTrail/>
        <slot/>
        <Footer/>
    </v-card>
</template>

<script>
    import Header from "../organisms/common/Header";
    import BreadcrumbTrail from "../organisms/common/BreadcrumbTrail";
    import Footer from "../organisms/common/Footer";
    export default {
        components: {
            Header,
            BreadcrumbTrail,
            Footer,
        }
    }
</script>
