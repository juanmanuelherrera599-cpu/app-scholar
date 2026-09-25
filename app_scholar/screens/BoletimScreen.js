import React from 'react';
import {
  StyleSheet,
  Text,
  TextInput,
  TouchableOpacity,
  ScrollView,
} from 'react-native';

export default function BoletimScreen({ navigation }) {
  return (
    <ScrollView contentContainerStyle={styles.container}>

      <Text style={styles.icone}>📋</Text>

      <Text style={styles.titulo}>Boletim</Text>

      <Text style={styles.subtitulo}>
        Registro de notas do aluno
      </Text>

      <TextInput
        style={styles.input}
        placeholder="Nome do aluno"
      />

      <TextInput
        style={styles.input}
        placeholder="Curso"
      />

      <TextInput
        style={styles.input}
        placeholder="Turma"
      />

      <TextInput
        style={styles.input}
        placeholder="Disciplina"
      />

      <TextInput
        style={styles.input}
        placeholder="Nota 1"
        keyboardType="numeric"
      />

      <TextInput
        style={styles.input}
        placeholder="Nota 2"
        keyboardType="numeric"
      />

      <TextInput
        style={styles.input}
        placeholder="Média"
        keyboardType="numeric"
      />

      <TouchableOpacity
        style={styles.botao}
        onPress={() => alert('Boletim registrado com sucesso!')}
        activeOpacity={0.8}
      >
        <Text style={styles.textoBotao}>
          ✓  Registrar Boletim
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