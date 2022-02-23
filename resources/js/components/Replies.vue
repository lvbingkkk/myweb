<template>
    <div>
        <!--v-on 缩写：@
        v-on:click="doThis"相当于 @click="doThis"
        v-bind 缩写：:
        v-bind:src="imageSrc"相当于 :src="imageSrc"

        v-slot 缩写：#-->

        <div v-for="(reply2,index) in items" :key="reply2.id">
            <reply2 :data="reply2"  @deleted="remove(index)"></reply2>

        </div>

        <paginator :dataSet="dataSet" @changed="fetch"></paginator>

<!--
        <new-reply :endpoint="endpoint" @created="add"></new-reply>
-->
        <new-reply @created="add"></new-reply>

    </div>

</template>



<script>
    import Reply2 from "./Reply2";
    import NewReply from './NewReply';
    import collection from '../mixins/Collection';

    export default {
        // props: ['data'],

        components:{Reply2,NewReply},

        // mixins 选项接收一个混入对象的数组。
        mixins: [collection],


//下面这个location和pathname不熟。。
        data() {
            return{
                dataSet:false,
                // items:this.data,
                // items: [],
                // endpoint:location.pathname+'/replies'

            }
        },

        created() {
            this.fetch();

        },

        // splice() 方法向/从数组中添加/删除项目，然后返回被删除的项目。
        methods:{
            fetch(page) {
                axios.get(this.url( page))
                    .then(this.refresh);
            },

//\d+ 什么意思？？？
            url(page) {
                if (!page) {
                    let query = location.search.match(/page=(\d+)/);

                    page = query ? query[1] : 1;
                }

                return `${location.pathname}/replies?page=${page}`;
            },

            refresh({data}) {
                this.dataSet = data;
                this.items = data.data;

                // 用户点击翻页后聚焦到回复区域的最上方
                window.scrollTo(0, 0);
            },
//抽取成collectio.js
            /*add(reply) {
                this.items.push(reply);
                this.$emit('added')
            },
            remove(index) {
                this.items.splice(index, 1);

                this.$emit('removed');

                flash('回复已删除！')
            }*/
        }
    }
</script>

