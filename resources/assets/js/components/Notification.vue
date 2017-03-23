<template>
    <div>

    </div>
</template>

<script type="text/babel">
    export default {
        mounted() {
            this.listen();
        },
        props:['id'],
        methods:{
            listen(){

                Echo.private('App.User.'+this.id).notification( (notification) => {
                    alert('new Notification');
                    console.log( notification );
                });

            }
        }
    }
</script>