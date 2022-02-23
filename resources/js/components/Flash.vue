<template>
<!--    <div class="alert alert-warning alert-flash" role="alert" v-show="show">-->
    <div class="alert alert-flash"
    :class="'alert-'+level"
    role="alert"
    v-show="show"
    v-text="body">

         <strong>Success ! </strong>  {{body }}
    </div>

</template>

<script>
    export default {

        props:['message'],

        data(){
            return {
                body : ''/*this.message*/,
                level : 'success',
                show:false
            }
        },

        created() {
            if (this.message) {
                this.flash(this.message);
                /*this.body = this.message;
                this.show = true;

                setTimeout(() => {
                    this.show = false;
                }, 3000);*/
            }

            // window.events.$on('flash', message => this.flash(message));
            window.events.$on(
                'flash',data => this.flash(data)
            );
        },

        methods:{
           /* flash(message) {
                this.body = message;
                this.show =true;

                this.hide();
            },*/

            flash(data){
                this.body = data.message;
                this.level = data.level;
                this.show = true;

                this.hide();
            },

            hide() {
                setTimeout(() => {
                    this.show = false;
                }, 3000);
            }
        }

    };
</script>

<style>
    .alert-flash{
        position: fixed;
        right: 25px;
        bottom: 25px;
    }
</style>

