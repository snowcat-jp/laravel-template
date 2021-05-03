<script>
    export default {
        methods: {
            getInfo: function(){
                const data = {}
                axios.get('/api/users', data)
                .then(
                    res => {

                    }
                )
            }
        }
    }
</script>