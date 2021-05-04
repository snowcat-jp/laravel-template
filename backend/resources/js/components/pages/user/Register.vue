<template>
    <Layout>
        <template>
            <v-content style="" class="pa-0 fill-height">
                <v-container>
                    <v-form>
                        <v-text-field
                        prepend-icon="mdi-account-circle"
                        label="name"
                        v-model="name"
                        />
                        <v-text-field
                        prepend-icon="mdi-account-circle"
                        label="email"
                        v-model="email"
                        />
                        <v-text-field 
                        v-bind:type="showPassword ? 'text' : 'password'"
                        @click:append="showPassword = !showPassword"
                        prepend-icon="mdi-lock"
                        append-icon="mdi-eye-off"
                        v-model="password"
                        label="パスワード"
                        />
                        <v-text-field 
                        v-bind:type="showPassword ? 'text' : 'password'"
                        @click:append="showPassword = !showPassword"
                        prepend-icon="mdi-lock"
                        append-icon="mdi-eye-off"
                        v-model="password_confirmation"
                        label="確認用パスワード"
                        />
                        <v-card-actions>
                            <v-btn @click="postRegister">登録</v-btn>
                        </v-card-actions>
                    </v-form>
                </v-container>
            </v-content>
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
            showPassword : false,
            name:"",
            email:"",
            password:"",
            password_confirmation:""
        }
    },
    methods: {
        postRegister: function(){
            const data = {
                "name":this.name,
                "email":this.email,
                "password":this.password,
                "password_confirmation":this.password_confirmation
            }
            axios.post('/api/users', data)
            .then(
                res => {
                    this.token = res.data.token
                    localStorage.setItem("auth", this.token)
                    localStorage.setItem("authType", 1)
                    location.href="/mypage"
                }
            )
            .catch(function (error) {
                alert(error.message)
            }
            )
        }
    }
}
</script>
