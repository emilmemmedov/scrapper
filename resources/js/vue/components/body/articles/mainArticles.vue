<template>
    <div class="articles">
        <table class="article_table">
            <tbody v-for="(article, index) in articles" :key="index">
                <tr>
                    <single-article
                        :article="article"
                    />
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import singleArticle from "./singleArticle";

    export default {
        name: "mainArticles",
        components: {
            singleArticle
        },
        data: function (){
            return {
                articles: []
            }
        },
        methods: {
            getArticles (){
                axios.get('http://localhost:8000/api/article').then(response=>{
                    this.articles = response.data;
                    console.log(this.articles);
                }).catch(error =>{
                    console.log(error);
                })
            }
        },
        created() {
            this.getArticles();
        }
    }
</script>

<style scoped>

</style>
