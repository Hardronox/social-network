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

                    noty({
                        type: 'success',
                        layout:'bottomLeft',
                        text: notification.name + ' ' + notification.message
                    });

                    this.$store.commit('addNot',notification);
                    document.getElementById("noty_audio").play();
                });

            }
        }
    }
</script>