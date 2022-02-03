<template>
    <div class="action-buttons">
        <button class="btn btn-outline-primary" @click="handleAction('edit')">
            <img class = "edit_icon" src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/64/Edit_icon_%28the_Noun_Project_30184%29.svg/1024px-Edit_icon_%28the_Noun_Project_30184%29.svg.png">
        </button>
    </div>
</template>

<script>
import articleEditModal from "./articleEditModal";

export default {
    name: "articleActionButtons",
    methods: {
        handleAction(actionName) {
            this.$modal.show(
                articleEditModal,
                {
                    data: this.data
                }
            );
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
