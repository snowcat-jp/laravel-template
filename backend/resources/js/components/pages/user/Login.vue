<template>
    <Layout>
        <template>
            <v-content style="" class="pa-0 fill-height">
                <v-container>
                    <v-form>
                        <v-text-field
                        prepend-icon="mdi-account-circle"
                        label="メールアドレス"
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
                        <v-card-actions>
                            <v-btn @click="postLogin">ログイン</v-btn>
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
            email:"",
            password:""
        }
    },
    methods: {
        postLogin: function(){
            const data = {
                "email":this.email,
                "password":this.password
            }
            axios.post('/api/login', data)
            .then(
                res => {
                    this.token = res.data.token
                    localStorage.setItem("auth", this.token)
                    localStorage.setItem("authType", 1)
                    location.href="/mypage"
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
