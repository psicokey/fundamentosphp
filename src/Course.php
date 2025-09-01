<?php 

namespace App;


class Course {
    public function __construct(
        protected string $title,
        protected string $subtitle,
        protected string $description,
        protected array $tags,
        protected CourseType $type = CourseType::FREE,
    ) {}
    public function __get($name) {
        if (property_exists($this, $name)){
            return $this->$name;
        }
        return null;
    } 
    public function __toString(): string {
        $html="<h1>{$this->title} - {$this->type->label()}</h1>";
        $html .= "<h2>{$this->subtitle}</h2>";
        $html .= "<p>{$this->description}</p>";
        $html .= "<ul>";
        foreach ($this->tags as $tag) {
            $html .= "<li>{$tag}</li>";
        }
        $html .= "</ul>";
        return $html;
    }
    public function getTitle(): string
    {
        return $this->title;
    }

public function getSubtitle(): string {
    return $this->subtitle;
}

public function getDescription(): string {
    return $this->description;
}

public function getTags(): array {
    return $this->tags;
}
public function addTag(string $tag): void {
    // Preparamos la etiqueta eliminando espacios en blanco al inicio y al final.
    $trimmedTag = trim($tag);

    // Validamos usando "cláusulas de guarda" para salir temprano si no se cumplen las condiciones.
    // 1. La etiqueta no debe estar vacía.
    // 2. No podemos tener más de 5 etiquetas.
    // 3. La etiqueta no debe existir ya en el arreglo.
    if (empty($trimmedTag) || count($this->tags) >= 5 || in_array($trimmedTag, $this->tags)) {
        return; // Si alguna condición se cumple, no hacemos nada y salimos del método.
    }

    $this->tags[] = $trimmedTag;
}
}