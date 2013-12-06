<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */

class UserIdentity extends CUserIdentity
{
	private $_id;
	public function authenticate()
        {
          $record = Usuarios::model()->findByAttributes(array('email'=>$this->username));
                  if($record===null)
              $this->errorCode=self::ERROR_USERNAME_INVALID;
          else if($record->senha!==md5($this->password))
              $this->errorCode=self::ERROR_PASSWORD_INVALID;
          else
          {
              $this->_id = $record->id;
              // Gravar o nome do usuario atual
              $this->setState('nomeReal', $record->nome);
              
              // Gravar o objeto do usuario atual
              $this->setState('usuarioLogado', $record);
              
              // Verificar o setor para setar o usuario com papel de admin
              $setorUsuario = Setores::model()->findByPk($record->setor);
              $setorUsuario = $setorUsuario->attributes['nome'];
              
              // Gravar em uma sessão se o usuário é administrador ou não
              if ( $record->administrador == 1 ) {
                $this->setState('role', 'admin');
                $this->setState('isAdmin', true);
              } else {
                $this->setState('role', 'usuarioNormal');
              }
              
              $this->errorCode=self::ERROR_NONE;
          }
          return !$this->errorCode;
        }
	
    public function getId()
    {
        return $this->_id;
    }
	
}
