import validationMessages from "../validationMessages";
import { validationMessage } from 'vuelidate-messages';

export default {
    methods: {
        validationMsg: validationMessage(validationMessages),
        showValidationErrors: async function() {
            this.$v.$touch();
            await this.$nextTick();

            const elem = document.querySelector('.is-invalid');

            if (elem.tagName == 'INPUT')
                elem.focus();
            else
                document.querySelector('.is-invalid input').focus();
        }
    }
}