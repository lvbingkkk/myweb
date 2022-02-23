

<template>
    <div :id="'reply'+id" class="card" style="margin-top: 15px;margin-bottom: 15px;">
        <div class="card-header">
            <div class="level">
                <h5 class="flex">
                    <a :href="'/profiles/'+data.owner.name"
                       v-text="data.owner.name">
                    </a> 回复于 {{ shijian}}

                </h5>

                <!--@if(Auth::check())-->
                <!--<div>-->
                <!--<favorite :reply="{{ $reply }}"></favorite>-->
                <!--</div>-->
                <!--@endif-->

                <div v-if="signIn">
                    <favorite :reply="data" ></favorite>
                </div>
                <div v-else >
                    <favorite :reply="data" :disabled="dis"></favorite>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div v-if="editing">
                <form @submit.prevent="update">
                    <div class="form-group">
                        <textarea class="form-control" v-model="body" required ></textarea>
                    </div>

                    <button class="btn btn-xs btn-primary" >保存</button>
                    <button class="btn btn-xs btn-link" @click="cancelReply" type="button">取消</button>
                </form>
            </div>

            <div v-else v-html="body"> </div>
        </div>

<!--        @can('update',$reply)-->
        <div class="panel-footer level" v-if="canUpdate">
            <button class="btn btn-xs btn-info mr-1" @click="editReply ">Edit</button>
            <button class="btn btn-xs btn-danger mr-1" @click="destroy">Delete</button>
        </div>
<!--        @endcan-->
    </div>
</template>

<script>
    import Favorite from './Favorite.vue';

    export default {
        props: ['data'],

        components: { Favorite },

        data() {
            return {
                dis:true,
                editing: false,
                id: this.data.id,
                body: this.data.body,
                shijian:this.data.creat_at
            };
        },

        computed:{
            signIn() {
                return window.App.signIn;
            },

            canUpdate() {
                /*if(!(window.App.user)){
                    return false;
                };*/
                // return this.data.user_id === window.App.user.id;
                return this.authorize(user => this.data.user_id === user.id);
            }
        },

        // patch请求 用于更新数据（修改），只将修改的数据推送到后端。
        methods:{
            update() {
                /*if (!(this.body)) {
                    flash('回复的内容不能为空！！！');
                    return;
                }*/
                axios.patch('/replies/' + this.data.id,{
                    body:this.body

                }).catch(error => {
                    flash(error.response.data,'danger');
                });

                this.editing = false;

                flash('Updated!');
            },

            destroy() {
                if ( confirm('确定删除回复吗？')) {
                    axios.delete('/replies/' + this.data.id);
                    this.$emit('deleted');

                }else {
                    return;
                }

                /*$(this.$el).fadeOut(300, () => {
                    flash('Your reply has been deleted!');
                });*/
            },

            editReply(){
                this.old_body_data =this.body;
                this.editing = true;
            },

            cancelReply(){
                this.body = this.old_body_data;
                this.old_body_data = '';
                this.editing = false;
            },

        }
    }
</script>
