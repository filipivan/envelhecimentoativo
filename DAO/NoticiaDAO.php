<?php
include_once 'Conexao.php';
class NoticiaDAO{
    protected $conn;
    function __construct() {
        $conexao = new Conexao ();
        $this->conn = $conexao->getConexao ();
    }

    public function inserirNoticia($titulo, $descricao, $autor, $nomeImagem){

        try {
            $this->conn->beginTransaction ();
            $comandoSQL =  'INSERT INTO noticias (titulo, descricao, autor, foto, data_publicacao, data_encerramento)
                            VALUES (:titulo, :descricao, :autor, :nomeImagem, now(), date_add(now(), INTERVAL 1 YEAR) )';
            $stmt = $this->conn->prepare ( $comandoSQL );
            $resultado = $stmt->execute ( array (
                'titulo' => $titulo,
                'descricao' => $descricao,
                'autor' => $autor,
                'nomeImagem' => $nomeImagem
            ) );
            $this->conn->commit ();
        } catch ( PDOException $e ) {
            $this->conn->rollback ();
            return false;
        }
        return true;

    }
}

?>