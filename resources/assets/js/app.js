new Vue({
    el: '#cadastros',
    created: function () {
        this.getCadastros();

        $("#buscaNome").autocomplete({
            source: 'pesquisar_paciente'
        });
    },
    data: {
        cadastros: [],
      
    },
    delimiters: ["${","}"],
    methods: {
        getCadastros: function () {
            var urlCadastros = 'pacientes';
            axios.get(urlCadastros).then(response => {
                this.cadastros = response.data;
            })

        },
       
    
        inativarCadastro: function (cadastro) {
            var r = confirm("deseja inativa cadastro!");

            if (r == true) {
                var urlInativar = 'paciente/' + cadastro.id;
                axios.post(urlInativar).then(response => {
                    this.getCadastros();
                });
            }else{             
                this.getCadastros();
            }
        },

        editarCadastro: function (cadastro){
            window.location = 'pacientes/'+cadastro.id;    
        }, 
        
        adicionarPaciente(){
            event.preventDefault();
            jQuery.ajax({
                url: "pacientes",
                type: "POST",
                data: $('#frmPaciente').serialize(),
                success: function( data )
                {
                    if(data.situacao=='success'){
                        $('#frmPaciente input').val("");   
                        alert('Paciente Cadastrado com Sucesso!')
                        this.getCadastros();
                    }
                    if(data.situacao == 'ErrorCadastro'){
                        alert('Paciente já possui Cadastro !')    
                    }
                }
            }
            
         );
        }, 
        
        alteraPaciente(){
            event.preventDefault();
            var r = confirm("deseja Alterar cadastro!");

            if (r == true) {  
            jQuery.ajax({
                url: "edita_pacientes",
                type: "POST",
                data: $('#frmPaciente').serialize(),
                success: function( data )
                {
                    if(data.situacao=='success'){
                        $('#frmPaciente input').val("");   
                        alert('Paciente Alterado  com Sucesso!')
                        window.location = '/'; 
                    }
                  
                }
            }
            
           );
        }else{

        }
    } 

         
    }
});



