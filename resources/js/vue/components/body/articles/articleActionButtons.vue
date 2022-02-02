<template>
    <div class="action-buttons">
        <button class="btn btn-outline-primary" @click="handleAction('edit')">
            <img class = "edit_icon" src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/64/Edit_icon_%28the_Noun_Project_30184%29.svg/1024px-Edit_icon_%28the_Noun_Project_30184%29.svg.png">
        </button>
    </div>
</template>

<script>
export default {
    name: "articleActionButtons",
    methods: {
        handleAction(actionName) {
            /* when the user clicks a button, that will trigger a mutation on our Vuex store
            The mutation may show a form for editing a resource, or maybe a popup box asking
            the user to confirm deleting a resource, or open a new page for the user to view
            a resource.
             */
            console.log(actionName);
        }
    },
    props: {
        data: {
            type: Object,
            required: true,
        },
    },
}
</script>

<style scoped>
    .edit_icon {
        width: 20px;
        height: 20px;
    }
</style>
