<template>
    <div class="main">
        <main-header />
        <main-body />
        <main-footer />
    </div>
</template>

<script>
    import mainBody from "./components/body/mainBody";
    import mainFooter from "./components/footer/mainFooter";
    import mainHeader from "./components/header/mainHeader";

    export default {
        components: {
            mainBody,
            mainFooter,
            mainHeader
        }
    }
</script>
