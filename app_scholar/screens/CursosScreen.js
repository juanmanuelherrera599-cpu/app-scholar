import React from 'react';
import {
  StyleSheet,
  Text,
  TextInput,
  TouchableOpacity,
  ScrollView,
} from 'react-native';

export default function CursosScreen({ navigation }) {
  return (
    <ScrollView contentContainerStyle={styles.container}>

      <Text style={styles.icone}>📚</Text>

      <Text style={styles.titulo}>Cursos</Text>

      <Text style={styles.subtitulo}>
        Cadastro de curso
      </Text>

      <TextInput
        style={styles.input}
        placeholder="Nome do curso"
      />

      <TextInput
        style={styles.input}
        placeholder="Descrição do curso"
      />

      <TextInput
        style={styles.input}
        placeholder="Duração do curso"
      />

      <TextInput
        style={styles.input}
        placeholder="Carga horária"
        keyboardType="numeric"
      />

      <TouchableOpacity
        style={styles.botao}
        onPress={() => alert('Curso cadastrado com sucesso!')}
        activeOpacity={0.8}
      >
        <Text style={styles.textoBotao}>
          ✓  Cadastrar Curso
        </Text>
      </TouchableOpacity>

      <TouchableOpacity
        style={styles.voltar}
        onPress={() => navigation.goBack()}
      >
        <Text style={styles.textoVoltar}>
          ← Voltar
        </Text>
      </TouchableOpacity>

    </ScrollView>
  );
}

const styles = StyleSheet.create({
  container: {
    flexGrow: 1,
    padding: 25,
    paddingTop: 30,
  },

  icone: {
    fontSize: 42,
    textAlign: 'center',
    marginBottom: 5,
  },

  titulo: {
    fontSize: 32,
    fontWeight: 'bold',
    textAlign: 'center',
  },

  subtitulo: {
    fontSize: 16,
    textAlign: 'center',
    opacity: 0.6,
    marginTop: 5,
    marginBottom: 28,
  },

  input: {
    borderWidth: 1,
    borderRadius: 14,
    padding: 16,
    marginBottom: 15,
    fontSize: 16,
  },

  botao: {
    borderRadius: 14,
    paddingVertical: 16,
    alignItems: 'center',
    marginTop: 8,
    elevation: 4,
  },

  textoBotao: {
    fontSize: 17,
    fontWeight: 'bold',
  },

  voltar: {
    alignItems: 'center',
    marginTop: 20,
    paddingVertical: 12,
  },

  textoVoltar: {
    fontSize: 16,
    fontWeight: 'bold',
  },
});