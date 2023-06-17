const validationMessages = {
    required: () => 'Campo Obrigatório',
    email: () => 'E-mail Inválido',
    minLength: ({ $params }) => `Deve ter pelo menos ${$params.minLength.min} caracteres`,
    maxLength: ({ $params }) => `Deve ter no máximo ${$params.maxLength.max} caracteres`,
    valid: () => 'Campo Inválido',
    phone: () => 'Formato de telefone inválido',
    cellphone: () => 'Formato de celular inválido',
    sameAs: ({ $params }) => `Deve ser igual ao campo ${$params.sameAs.eq == 'password' ? 'senha' : $params.sameAs.eq}`
};

export default validationMessages;
