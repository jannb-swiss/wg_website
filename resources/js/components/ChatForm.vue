<template>
    <div class="input-group mt-1">
        <input
            id="btn-input"
            type="text"
            name="message"
            class="form-control input-sm"
            placeholder="Nachricht..."
            v-model="newMessage"
        @keyup.enter="sendMessage"
        />
        <span class="input-group-btn">
      <button class="btn btn-primary" id="btn-chat" @click="sendMessage">
        Senden
      </button>
    </span>
    </div>
</template>
<script>
export default {
    props: ["user"],
    data() {
        return {
            newMessage: "",
        };
    },
    methods: {
        sendMessage() {
            this.$emit("messagesent", {
                user: this.user,
                message: this.newMessage,
            });
            this.newMessage = "";
        },
    },
};
</script>
