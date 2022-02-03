<template>
    <div class="edit-modal">
        <p id ="heading">Edit Points</p>
        <label>Points</label> <input class="points-data" type="number" :value="data.points"/>
        <button class="edit-points" @click="save">Save</button>
    </div>
</template>

<script>
export default {
    name: "articleEditModal",
    data(){
        return{
            url: process.env.MIX_APP_URL + ":" + process.env.MIX_APP_PORT
        }
    },
    props: {
        data: {
            type: Object,
            required:true
        },
    },
    methods: {
        show () {
            this.$modal.show('edit-modal');
        },
        hide () {
            this.$modal.hide('edit-modal');
        },
        save () {
            let points = document.getElementsByClassName('points-data')[0].value;

            axios.put(this.url + '/api/' + 'article/' + this.data.id,{
                'points': points
            }).then(response=>{
                if (response.data.code === 200){
                    this.$modal.hideAll();
                    window.location.reload();
                }
            })
        }
    },
    mount () {
        this.show()
    }
}
</script>

<style scoped>
    #heading{
        text-align: center;
        font-size: 30px;
    }
    label {
        color: #1a202c;
        margin-left: 20px;
        margin-right: 10px;
    }
    .edit-points{
        border: none;
        outline: none;
        font-size: 22px;
        background-color: #0b2e13;
        border-radius: 5px;
        color: white;
    }
    .edit-points:hover {
        background-color: yellowgreen;
    }
</style>
