<template>
    <Layout>
        <template>
            <v-btn
                elevation="2"
            >button</v-btn>
        </template>
    </Layout>
</template>

<script>
    import Layout from "../../layouts/Layout"
    export default {
        components: {
            Layout
        },
        data() {
            return {
                userData:[]
            }
        }
    }
</script>
