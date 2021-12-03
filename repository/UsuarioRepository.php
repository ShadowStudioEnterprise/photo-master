<?php

require_once __DIR__ . '/../entity/Usuario.php';

require_once __DIR__ . '/../database/QueryBuilder.php';

class UsuarioRepository extends QueryBuilder

{
    private $passwordGenerator;

    public function __construct(IPasswordGenerator $passwordGenerator){
        $this->passwordGenerator = $passwordGenerator;
        parent::__construct('users', 'Usuario');

    }
    public function findByUserNameAndPassword(string $username, string $password): ?Usuario
    {
        $sql = "SELECT * FROM $this->table WHERE username = :username AND password = :password";
        $parameters = ['username' => $username, 'password' => $this->passwordGenerator::encrypt($password)];
        try {
            $pdoStament =$this->connection ->prepare($sql);
            $pdoStament->execute($parameters);
            $pdoStament->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $this->classEntity);
            $result= $pdoStament->fetch();
            if(empty($result)){
                throw new NotFoundException("No se ha encontrado ningún usario con esas credenciales");
            }else{
                if (!$this->passwordGenerator::passwordVerify($password, $result->getPassword())) {
                    throw new NotFoundException("No se ha encontrado ningún usario con esas credenciales");
                }
            }
            return $result; 
        } catch (\PDOException $pdoException) {
            throw new QueryException("No se ha podido ejecutar la consulta solicitada: ".$pdoException->getMessage());
        }
        return null;
    }
    public function save(Entity $entity)
    {
        
        $parameters =$entity->toArray();
        $parameters['password'] = $this->passwordGenerator::encrypt($parameters['password']);
        parent::save($entity);
    }
}