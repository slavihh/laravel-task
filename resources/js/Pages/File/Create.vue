<template>
    <card>

        <jet-validation-errors class="mb-4" />

        <form @submit.prevent="submit">
            <div>
                <jet-label for="name" value="Name" />
                <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <jet-label for="file" value="File" />
                <jet-input id="file" type="file" class="mt-1 block w-full" v-model="form.file" required />
            </div>



            <div class="flex items-center justify-center mt-4">
                <jet-button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Add new file
                </jet-button>
            </div>
        </form>
    </card>
</template>

<script>
import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo'
import JetButton from '@/Jetstream/Button'
import JetInput from '@/Jetstream/Input'
import JetCheckbox from "@/Jetstream/Checkbox";
import JetLabel from '@/Jetstream/Label'
import JetValidationErrors from '@/Jetstream/ValidationErrors'
import Card from "@/Jetstream/Card";
export default {
    components: {
        Card,
        JetAuthenticationCardLogo,
        JetButton,
        JetInput,
        JetCheckbox,
        JetLabel,
        JetValidationErrors
    },

    data() {
        return {
            form: this.$inertia.form({
                name: '',
                file: ''
            })
        }
    },

    methods: {
        submit() {
            this.form.post(this.route('create'), {
                onFinish: () => this.form.reset('password', 'password_confirmation'),
            })
        }
    }
}
</script>
