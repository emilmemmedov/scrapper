<template>
    <div class = "body">
        <p class="heading">Articles</p>
        <main-articles />
    </div>
</template>

<script>
import mainArticles from "./articles/mainArticles";

export default {
    name: "mainBody",
    components: {
        mainArticles
    }
}
</script>

<style scoped>
.heading {
    font-size: 50px;
    display: block;
    text-align: center;
}
</style>
