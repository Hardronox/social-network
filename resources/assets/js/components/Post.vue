<template>
    <div class="feed-list">
        <div class="feed">
            <textarea name="" rows="3" class="form-control" v-model="text"></textarea>

            <button type="submit" class="btn success" :disabled="disabled" @click="createPost">Submit</button>
        </div>
        <div class="feed">
            You are logged in!Next up, let's review Redis' hash data type. Think of these as a Redis equivalent to PHP's associative array. When you need to associate a number of key-value pairs with a single key, this is the type you should reach for. Near the conclusion of this lesson, we'll also touch upon Laravel's Cache component, and how that fits in with our Redis review.
            Next up, let's review Redis' hash data type. Think of these as a Redis equivalent to PHP's associative array. When you need to associate a number of key-value pairs with a single key, this is the type you should reach for. Near the conclusion of this lesson, we'll also touch upon Laravel's Cache component, and how that fits in with our Redis review.
        </div>
        <div class="feed">
            You are logged in!Next up, let's review Redis' hash data type. Think of these as a Redis equivalent to PHP's associative array. When you need to associate a number of key-value pairs with a single key, this is the type you should reach for. Near the conclusion of this lesson, we'll also touch upon Laravel's Cache component, and how that fits in with our Redis review.
            Next up, let's review Redis' hash data type. Think of these as a Redis equivalent to PHP's associative array. When you need to associate a number of key-value pairs with a single key, this is the type you should reach for. Near the conclusion of this lesson, we'll also touch upon Laravel's Cache component, and how that fits in with our Redis review.
        </div>
        <div class="feed">
            You are logged in!Next up, let's review Redis' hash data type. Think of these as a Redis equivalent to PHP's associative array. When you need to associate a number of key-value pairs with a single key, this is the type you should reach for. Near the conclusion of this lesson, we'll also touch upon Laravel's Cache component, and how that fits in with our Redis review.
            Next up, let's review Redis' hash data type. Think of these as a Redis equivalent to PHP's associative array. When you need to associate a number of key-value pairs with a single key, this is the type you should reach for. Near the conclusion of this lesson, we'll also touch upon Laravel's Cache component, and how that fits in with our Redis review.
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {

        },
        data() {
            return {
                disabled: true,
                text: ''
            }
        },
        methods:{
            createPost(){
                axios.post('/create/post',{text: this.text})
                        .then( (response) => {
                    this.text='';
                    noty({
                        type: 'success',
                        layout:'bottomLeft',
                        text: 'Your post has been published!'
                    });
                })
            }
        },
        watch: {
            text(){
                if(this.text.length > 0)
                    this.disabled=false;
                else
                    this.disabled=true;
            }
        }
    }
</script>