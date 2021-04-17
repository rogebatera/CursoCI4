<div class="container">
<?php
    /*$atributos = ['class' => 'usuarios', 'id' => 'meuFormulario'];
    $hidden = ['usuarios' => 'Emerson', 'user_id' => '123'];
    echo form_open('/usuarios/gravar', $atributos, $hidden);
        $data = [
            'name' => 'Camila',
            'email' => 'meuemail@teste.com',
            'url' => 'http://teste.com.br'
        ];
        echo form_hidden($data);

        $data = [
            'type'  => 'text',
            'name'  => 'email',
            'id'    => 'email',
            'value' => 'meuemail@meuemail.com.br',
            'class' => 'minhaclasse'
        ];

        echo form_input($data);

        $opcoes = [
            'p' => 'Camisa Pequena',
            'm' => 'Camisa Média',
            'g' => 'Camisa Grande',
            'gg' => 'Camisa Muito Grande'
        ];
        echo form_dropdown('camisas', $opcoes, 'm');

        $camisas_venda = ['m', 'gg'];

        echo form_dropdown('camisas', $opcoes, $camisas_venda);

        $data = [
            'name' => 'aceitar',
            'id' => 'aceitar',
            'value' => 'Aceitar',
            'checked' => true,
            'style' => 'margin: 10px'
        ];

        echo form_checkbox($data);

        $atributos = [
            'class' => 'meulabel',
            'style' => 'color: red;'    
        ];
        echo form_label('Meu Nome é:', 'nome', $atributos);
        echo form_submit('enviar', 'Enviar');

        $data = [
            'name' => 'enviar',
            'type' => 'submit',
            'class' => 'btn btn-primary',
            'content' => 'Enviar'
        ];

        echo form_button($data);
    echo form_close();
    */

    $user = [
        'type'  => 'text',
        'name'  => 'user',
        'id'    => 'user',
        'class' => 'form-control'
    ];

    $senha = [
        'type'  => 'password',
        'name'  => 'senha',
        'id'    => 'senha',
        'class' => 'form-control'
    ];

    $btn = [
        'type'    => 'submit',
        'name'    => 'btn',
        'content' => 'Gravar',
        'class'   => 'btn btn-primary my-3'
    ];

    echo form_open('/usuarios/gravar').
    form_label('Usuarios', 'user').
    form_input($user).
    form_label('Senha', 'senha').
    form_input($senha).
    form_button($btn).
    form_close();
?>
</div>