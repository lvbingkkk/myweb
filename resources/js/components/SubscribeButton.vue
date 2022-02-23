<template>
    <button :class="classes"  @click="subscribe">Subscribe(订阅)</button>
</template>

<script>
    export default {
        // name: "SubscribeButton"
        props: ['active'],

        data(){
            return{isActive : false,
            }
        },

        computed: {
            classes() {
                return ['btn',this.isActive ? 'btn-primary' : 'btn-secondary'];
            }
        },

        mounted() {
            this.isActive = this.active
        },

        methods:{
            subscribe(){
                // axios.post(location.pathname + '/subscriptions');

                axios [(this.isActive ? 'delete' : 'post')](location.pathname + '/subscriptions');

                this.isActive = ! this.isActive;
                // this.$emit('change-active');

                flash(this.isActive ? '您已成功订阅该话题！' : '已取消订阅该话题。');
            }
        }

    }
</script>


