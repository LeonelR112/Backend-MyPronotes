<?php

    class Note{

        private $id;
        private $title;
        private $content;
        private $created_at;
        private $updated_at;
        private $id_user;

        public function getNotes(){
                //retorna todas las notas
            $link = Conexion::Conectar();
            $sql = "SELECT id, title, content, created_at, updated_at, id_user FROM notes";

            $stmt = $link->prepare($sql);

            if(!$stmt->execute()){
                return false;
            }
            else{
                $notes = $stmt->fetchAll(PDO::FETCH_ASSOC);

                return $notes;
            }
        }

        public function showNote($id){
                //retorna una nota por el id de la nota
            $link = Conexion::Conectar();
            $sql = "SELECT id, title, content, created_at, updated_at, id_user FROM notes WHERE id = :id";

            $stmt = $link->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            if(!$stmt->execute()){
                return false;
            }
            else{
                $note = $stmt->fetch(PDO::FETCH_ASSOC);

                return $note;
            }
        }

        public function getNotesByIdUser($idUser){
                //returna todas las notas según por el id del usuario
             $link = Conexion::Conectar();
             $sql = "SELECT id, title, content, created_at, updated_at, id_user FROM notes WHERE id_user = :idUser";

             $stmt = $link->prepare($sql);
             $stmt->bindParam(':idUser', $idUser, PDO::PARAM_STR);

             if(!$stmt->execute()){
                return false;
             }
             else{
                $notes = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $notes;
             }
        }

        public function addNote(array $contents){
                //agrega una nota nueva
                $link = Conexion::Conectar();
                $sql = "INSERT INTO notes (title, content, created_at, updated_at, id_user) VALUES (:tlt, :cnt, :cta, :uta, :idu)";
                
                $stmt = $link->prepare($sql);
                $stmt->bindParam(':tlt', $contents['titulo'], PDO::PARAM_STR);
                $stmt->bindParam(':cnt', $contents['contenido'], PDO::PARAM_STR);
                $stmt->bindParam(':cta', $contents['creado_en'], PDO::PARAM_STR);
                $stmt->bindParam(':uta', $contents['actualizado_en'], PDO::PARAM_STR);
                $stmt->bindParam(':idu', $contents['id_user'], PDO::PARAM_STR);

                if(!$stmt->execute()){
                     return false;
                }
                else{
                    $this->setId($link->lastInsertId());
                    $this->setTitle($contents['titulo']);
                    $this->setContent($contents['contenido']);
                    $this->setCreated_at($contents['creado_en']);
                    $this->setUpdated_at($contents['actualizado_en']);
                    $this->setId_user($contents['id_user']);

                    return true;
                }

        }

        public function modifyNote(array $dataJson){
                //modifica una nota existente
                $link = Conexion::Conectar();
                $sql = "UPDATE notes SET title = :title, content = :content, updated_at = :updated WHERE id = :id";

                $stmt= $link->prepare($sql);
                $stmt->bindParam(':id', $dataJson['id'], PDO::PARAM_INT);
                $stmt->bindParam(':title', $dataJson['title'], PDO::PARAM_STR);
                $stmt->bindParam(':content', $dataJson['content'], PDO::PARAM_STR);
                $stmt->bindParam(':updated', $dataJson['updated_at'], PDO::PARAM_STR);

                if(!$stmt->execute()){
                     return false;
                }
                else{
                     $this->setId($dataJson['id']);
                     $this->setTitle($dataJson['title']);
                     $this->setContent($dataJson['content']);
                     $this->setUpdated_at($dataJson['updated_at']);

                     return true;
                }
        }

        public function deleteNote($id){
                //elimina una nota por su id
                $link = Conexion::Conectar();
                $sql = "DELETE FROM notes WHERE id = :id";

                $stmt = $link->prepare($sql);
                $stmt->bindParam(":id", $id, PDO::PARAM_INT);

                if(!$stmt->execute()){
                     return false;
                }
                else{
                     return true;   
                }
        }

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of title
         */ 
        public function getTitle()
        {
                return $this->title;
        }

        /**
         * Set the value of title
         *
         * @return  self
         */ 
        public function setTitle($title)
        {
                $this->title = $title;

                return $this;
        }

        /**
         * Get the value of content
         */ 
        public function getContent()
        {
                return $this->content;
        }

        /**
         * Set the value of content
         *
         * @return  self
         */ 
        public function setContent($content)
        {
                $this->content = $content;

                return $this;
        }

        /**
         * Get the value of created_at
         */ 
        public function getCreated_at()
        {
                return $this->created_at;
        }

        /**
         * Set the value of created_at
         *
         * @return  self
         */ 
        public function setCreated_at($created_at)
        {
                $this->created_at = $created_at;

                return $this;
        }

        /**
         * Get the value of updated_at
         */ 
        public function getUpdated_at()
        {
                return $this->updated_at;
        }

        /**
         * Set the value of updated_at
         *
         * @return  self
         */ 
        public function setUpdated_at($updated_at)
        {
                $this->updated_at = $updated_at;

                return $this;
        }

        /**
         * Get the value of id_user
         */ 
        public function getId_user()
        {
                return $this->id_user;
        }

        /**
         * Set the value of id_user
         *
         * @return  self
         */ 
        public function setId_user($id_user)
        {
                $this->id_user = $id_user;

                return $this;
        }
    }

?>