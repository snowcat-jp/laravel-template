<template>
  <div>
    <v-app-bar
      color="deep-purple"
      dark
    >
      <v-app-bar-nav-icon @click="drawer = true"></v-app-bar-nav-icon>

      <v-toolbar-title>タイトル</v-toolbar-title>
    </v-app-bar>

    <v-navigation-drawer
      v-model="drawer"
      absolute
      temporary
    >
      <v-list
        nav
        dense
      >
        <v-list-item-group
          v-model="group"
          active-class="deep-purple--text text--accent-4"
        >
          <v-list-item>
            <v-list-item-icon>
              <v-icon>mdi-home</v-icon>
            </v-list-item-icon>
            <v-list-item-title>コンテンツ</v-list-item-title>
          </v-list-item>

          <v-list-item
          v-if="authType !== 0"
          >
            <v-list-item-icon>
              <v-icon>mdi-home</v-icon>
            </v-list-item-icon>
            <v-list-item-title>マイページ</v-list-item-title>
          </v-list-item>

          <v-list-item
          v-if="authType !== 0"
          >
            <v-list-item-icon>
              <v-icon>mdi-account</v-icon>
            </v-list-item-icon>
            <v-list-item-title>アカウント</v-list-item-title>
          </v-list-item>
        </v-list-item-group>
      </v-list>
    </v-navigation-drawer>
  </div>
</template>

<script>
  export default {
    mounted: function() {
      this.checkAuth()
    },
    data: () => ({
      drawer: false,
      group: null,
      authType: 0,
    }),
    methods: {
      checkAuth: function() {
        if (localStorage.getItem("authType")) {
          this.authType = localStorage.getItem("authType")
        }
      }
    }
  }
</script>
