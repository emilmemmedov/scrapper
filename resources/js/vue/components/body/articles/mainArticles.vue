<template>
    <div class="articles">
        <data-table v-bind="bindings"/>
    </div>
</template>

<script>
    import DataTable from "@andresouzaabreu/vue-data-table";
    import Vue from "vue";
    Vue.component("data-table", DataTable);

    import "../../../../../css/bootstrap.min.css";
    import "@andresouzaabreu/vue-data-table/dist/DataTable.css";
    import ArticleActionButtons from "./articleActionButtons";

    export default {
        name: "mainArticles",
        computed: {
            bindings(){
                return{
                    columns: [
                        {
                            'key': 'id',
                        },
                        {
                            'key': 'title',
                        },
                        {
                            'key': 'link',
                        },
                        {
                            'key': 'points',
                        },
                        {
                            'key': 'creation_date',
                        },
                        {
                            'key': 'actions',
                            'title': 'Actions',
                            'component': ArticleActionButtons
                        }
                    ],
                    data: this.articles,
                    actionMode: "single",
                }
            }
        },
        data: function (){
            return {
                articles: []
            }
        },
        methods: {
            getArticles (){
                axios.get('http://localhost:8000/api/article').then(response=>{
                    this.articles = response.data.content;
                }).catch(error =>{
                    console.log(error);
                })
            },
        },
        created() {
            this.getArticles();
        }
    }
</script>

<style scoped>

</style>
