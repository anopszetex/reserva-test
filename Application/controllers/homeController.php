<?php  
	namespace controllers;
	use \models\Models;
	use \views\mainView;

	class homeController extends Models {

		function __construct() {
			parent::__construct();
			$this->view = new mainView();
		}

		public function index() {
			if(isset($_POST['acao'])) {
				$nome     = $this->checkInput($_POST['nome']);
				$dataHora = $this->checkInput($_POST['dataHora']);

				if(!empty($dataHora) && !empty($nome)) {
					$dataHora = explode(' ', $dataHora);
					
					if($dataHora[0] == date('d/m/Y')) {
						$dataHora = implode(' ', $dataHora);
						$formData = \DateTime::createFromFormat('d/m/Y H:i:s', $dataHora);
						$dataHora = $formData->format('Y-m-d H:i:s');
						$dados    = ['nome' => $nome, 'horario' => $dataHora];

						if($this->insert('tb_agenda', $dados)) {
							$_SESSION['sucesso']     = true;
							$_SESSION['boxMensagem'] = 'Seu horário foi agendado com sucesso!';
						} else {
							$_SESSION['sucesso']     = false;
							$_SESSION['boxMensagem'] = 'Houve um erro ao agendar, tente novamente.';
						}

					} else {
						$_SESSION['sucesso']     = false;
						$_SESSION['boxMensagem'] = 'Data de agendamento inválida!';
					}

				} else {
					$_SESSION['sucesso']     = false;
					$_SESSION['boxMensagem'] = 'Campos vazios não são permitidos!';
				}
			}

			$this->view->render('home', ['model' => $this]);
		}

		public function reservas() {
			$this->view->render('reservas-atuais', ['model' => $this], 'headerAdmin', null);
		}

	}

?>